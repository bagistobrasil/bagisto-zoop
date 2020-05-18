<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoopPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoop_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cart_id')->unique();
            $table->json('zoop_payment_data')->nullable();
            $table->json('zoop_order_data')->nullable();
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
        Schema::dropIfExists('zoop_payments');
    }
}
