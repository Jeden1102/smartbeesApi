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
            //tutaj bym tak nie robił tylko pewnie zapisywał dane dot. usera do tabeli z userami + zaciągał dane o userze gdy jest zalogowany. Teraz będize syf bo w jednej tabeli będą info dot. zamówienia i info dot usera, a tak do rzucam tutaj user_id jako klucz obcy i koniec
            $table->id();
            $table->string('order_code');
            $table->string('name');
            $table->string('surname');
            $table->string('country');
            $table->string('address');
            $table->string('postCode');
            $table->string('city');
            $table->string('phoneNumber');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('delivery_country')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_postCode')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_method')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('promo_code')->nullable();
            $table->string('price');
            $table->string('comment')->nullable();
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
