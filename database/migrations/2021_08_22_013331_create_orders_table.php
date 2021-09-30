<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('idProduct');
            $table->integer('userID');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            $table->string('companyName');
            $table->string('city');
            $table->string('email');
            $table->integer('phone');
            $table->string('state');
            $table->string('postCode');
            $table->string('country');
            $table->string('note');
            $table->integer('amount');
            $table->float('totalPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
