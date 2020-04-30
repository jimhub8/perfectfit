<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_sale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('size')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('sku_no')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sku_id')->nullable();
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('seller_id');
            // $table->foreign('sku_id')->references('id')->on('skus') ->onDelete('cascade');
            $table->foreign('sale_id')->references('id')->on('sales') ->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories') ->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('sellers') ->onDelete('cascade');
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
        Schema::dropIfExists('category_sale');
    }
}
