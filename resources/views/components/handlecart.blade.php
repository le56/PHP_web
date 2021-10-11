<script>
// add cart all page
$("button[data-add-product-cart]").click(function(e) {
    e.preventDefault();
    createOrUpdateCart(1,this,"data-add-product-cart",null)
    if($('.text-empty')) $('.text-empty').remove(); 
});
// add cart details page
$('#btn-addToCart-detailsPage').click(function(e){
    e.preventDefault();
    createOrUpdateCart($('#input-addToCart-detailsPage').val(),this,"data-add-product-cart-details",null)
    if($('.text-empty')) $('.text-empty').remove(); 
})
// delete cart in cart page
$('#list-cart-cartPage').on('click',"a.icon-cart-remove",function (e) {
    e.preventDefault();
    let id = $(this).attr("data-delete-cart");
    deleteFromCart(id,true)
})
// delete cart header
$("#list-cart-header").on("click", "a.nk-cart-remove-item", function (e) {
    e.preventDefault();
    let id = $(this).attr("data-delete-cart-header");
    deleteFromCart(id,Boolean($('#cartPage')))
});
// update quantity cart
$('input[data-input-updateCart]').change(function (e) {
    createOrUpdateCart(e.target.value,this,"data-input-updateCart",Boolean($('#cartPage')))
})
// func handle create or update cart
function createOrUpdateCart(quantity = 1,element,attrData,checkIsCartPage) {
    let isReplace = false;
    if(checkIsCartPage) isReplace = true;
    $.post(
        "{{route('cart.createOrUpdate')}}",
        { idProduct: $(element).attr(attrData), quantity,isReplace },
        function (data) {
            const { cart,message } = data;
           if(message === "created") {
            $("#list-cart-header").prepend(`
            <div class="nk-widget-post" item-delete-cart-header="${cart.id}">
                                    <a href="{{asset('/product')}}/${cart.product.id}" class="nk-post-image">
                                        <img src="{{ asset('public/images') }}/${cart.product.image0}" alt="${cart.product.title}">
                                    </a>
                                    <h3 class="nk-post-title">
                                        <a href="#" data-delete-cart-header="${cart.id}" class="nk-cart-remove-item"><span class="ion-android-close"></span></a>
                                        <a href="{{asset('/product')}}/${cart.product.id}">${cart.product.title}</a>
                                    </h3>
                                    <div class="nk-product-price"><b>Price :</b> $ ${cart.product.price}</div>
                                    <div class="nk-product-price nk-product-quantity"><b>Quantity :</b>${cart.quantity}</div>
                                </div>
            `);
            $("#quantity-cart-header").text((index, currentcontent) => {
                return parseInt(currentcontent) + 1;
            });
            alert("Added to cart !");
           }
           else {
            $(`div[item-delete-cart-header="${cart.id}"] .nk-product-quantity`).text(cart.quantity)
            if(checkIsCartPage) {
                $(`tr[item-delete-cart="${cart.id}"] .total-price-item`).text("$ "+cart.totalPrice)
                setTotalPrice(data.totalPrice)
            }
            alert("Updated to cart !");
           }
        }
    ).fail(function () {
        alert("Please login  to continue !");
        $('#btn-login').trigger('click');
    });
}
// func handle delete from cart
function deleteFromCart(id,checkIsCartPage) {
    $.ajax({
        type: "DELETE",
        url: `{{asset("/cart")}}/${id}`,
        success:  function (data) {
            $(`div[item-delete-cart-header='${id}']`).remove();
            $("#quantity-cart-header").text((index, currentcontent) => {
                return parseInt(currentcontent) - 1;
            });
            if(checkIsCartPage) {
                 $(`tr[item-delete-cart='${id}']`).remove();
                 setTotalPrice(data.totalPrice)
            }
            if ($('#list-cart-header').children().length === 0 ) {
                $('#list-cart-header').html(`
                <h3 class="pt-3 pl-3 text-empty">
                    Cart list is empty ! <a href="{{asset('/catalog')}}">Add now !</a>
                </h3>
                `)
            }
            alert("Deleted from cart !");
        },
        error: function (error) {
            alert(error);
        },
    });
}
// func set total price 
function setTotalPrice(price) {
    $("#subTotal").text("$ "+price)
    $("#totalPrice").text("$ "+price)
}
</script>
