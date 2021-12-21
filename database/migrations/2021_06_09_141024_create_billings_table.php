<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('user_id')->nullable();
            $table->string('stripe_token_id')->nullable();
            $table->string('charge_id')->nullable();
            $table->string('stripe_customer')->nullable();
            $table->string('stripe_card')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('address')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('address_4')->nullable();
            $table->string('business_name')->nullable();
            $table->tinyInteger('shipping_method')->default(0)->comment('canada_post = 0, courier_post = 1');
            $table->string('card_type')->nullable();
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
        Schema::dropIfExists('billings');
    }
}
