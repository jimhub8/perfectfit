<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('total_price')->nullable();
            $table->decimal('sub_total')->nullable();
            $table->decimal('discount')->nullable();
            $table->string('order_no')->nullable();
            $table->string('sku_no')->nullable();
            $table->string('payment_id')->nullable();
            $table->text('paypal')->nullable();
            $table->string('payment_method')->nullable();
            // $table->unsignedBigInteger('sku_id');
            // $table->foreign('sku_id')->references('id')->on('skus') ->onDelete('cascade');


            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('users') ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('sales');
    }
}
