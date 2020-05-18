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
            $table->string('order_id');
            $table->string('status')->nullable();
            $table->string('reference')->nullable();
            $table->string('event')->nullable();
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
