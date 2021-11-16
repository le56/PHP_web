<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\InputFields;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\PaymentExecution;
use PayPal\Api\WebProfile;
use App\Http\common\common;

class paypalController extends Controller
{
    public function index(Request $request){
        $data = common::getCartAndTotalPrice(Auth::user()->email);
        $carts = $data['carts'];
        $totalPrice =  $data['totalPrice'];
        
        if(count($carts)===0) return redirect()->back()->with(["status" =>"Not have item in cart to checkout !","error"=>"true"]);
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ASqULqe291kN2EcXuLUsM9RpIYdOoo9lRdHXZ_XrhK5xXxPk_R1JAfNXIiaZeb6_HFRhtEHhJlvN1e0I',     // ClientID
                'EHq1R7l2H-DrbiB1lWCpJ4myoG7z_E3bCkubdST4Ab6e1a_8N4eZtW2hTxQ6i0R5a4NL7oeEZC6jvHi0'      // ClientSecret
            )
        );
        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($totalPrice);
        $amount->setCurrency('USD');

        $listItems = [];
        foreach ($carts as $item ) {
            $newItem = new Item();
            $newItem->setName($item->product->name)
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setSku($item->id) 
                ->setPrice($item->totalPrice);
            array_push($listItems, $newItem);   
        }

        $itemList = new ItemList();
        $itemList->setItems($listItems);


        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($itemList);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal_return'))
            ->setCancelUrl(route('paypal_cancel'));

        // Add NO SHIPPING OPTION
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1);

        $webProfile = new WebProfile();
        $webProfile->setName('test' . uniqid())->setInputFields($inputFields);

        $webProfileId = $webProfile->create($apiContext)->getId();

        $payment = new \PayPal\Api\Payment();
        $payment->setExperienceProfileId($webProfileId); // no shipping
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);
        
        try {
            $payment->create($apiContext);
            echo $payment;
            echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
            return redirect($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }
    public function paypalReturn(){
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ASqULqe291kN2EcXuLUsM9RpIYdOoo9lRdHXZ_XrhK5xXxPk_R1JAfNXIiaZeb6_HFRhtEHhJlvN1e0I',     // ClientID
                'EHq1R7l2H-DrbiB1lWCpJ4myoG7z_E3bCkubdST4Ab6e1a_8N4eZtW2hTxQ6i0R5a4NL7oeEZC6jvHi0'      // ClientSecret
            )
        );

        $paymentId = $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
        $payerId = $_GET['PayerID'];

       // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            // Execute payment
            $email = Auth::user()->email;
            $result = $payment->execute($execution, $apiContext);
            $carts = Cart::where("email",$email)->get();
            foreach($carts as $item) {
                Order::create([
                    "email" => $item["email"],
                    "idProduct" => $item["idProduct"],
                    "quantity" => $item["quantity"],
                    "totalPrice" => $item["totalPrice"],
                    "status" => "Paid"
                ]);
                $product = products::find($item["idProduct"]);
                $product->selled = $product->selled + $item["quantity"];
                $product->quantityRemain = $product->quantityRemain - $item["quantity"];
                $product->save();
            }
            Cart::where("email",$email)->delete();
            // send mail
         
            $data = array("carts" => $carts);
            Mail::send("vendor.mail.orderDone",$data,function($message){
                $message->to(Auth::user()->email)->subject("Payment order successful!");
                $message->from("skygamershop102@gmail.com","Skygamer shop");
            });
            return redirect('checkout')->with(["status"=>"Payment order successful. Please check your email !"]);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        }
    }
    public function paypalCancel(){
        return "order canceled";
    }
}
