<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cashier_role_id');
            $table->string('username');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->integer('phone');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('sales_id');
            $table->dateTime('last_trasaction_at');
            $table->foreign('cashier_role_id')->references('id')->on('cashier_roles');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('sales_id')->references('id')->on('sales');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cashiers');
    }
}
