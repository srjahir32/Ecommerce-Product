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
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_mobile');
            $table->string('address');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('zip');
            $table->string('country');
            $table->string('product_name');
            $table->string('currency');
            $table->bigInteger('price');
            $table->bigInteger('quantity');
            $table->bigInteger('total');
            $table->integer('order_status')->default(0);
            $table->string('payment_type');
            $table->string('card_number')->nullable();
            $table->string('card_expiry')->nullable();
            $table->integer('card_cvc')->nullable();
            $table->string('card_name')->nullable();
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
