<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedinteger('stock')->default(0);
            $table->unsignedinteger('stock_defective')->default(0);
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->foreign('branch_id')->references('id')->on('branch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
