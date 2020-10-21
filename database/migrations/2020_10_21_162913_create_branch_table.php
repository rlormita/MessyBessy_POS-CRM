<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_name');
            $table->string('branch_street');
            $table->string('branch_city');
            $table->string('branch_state');
            $table->integer('branch_post_code');
            $table->string('branch_country');
            $table->string('branch_contact_number');
            $table->string('branch_operating_hours');
            $table->string('branch_other_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cashier_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cashier_role_title');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
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
        Schema::dropIfExists('branches');
        Schema::dropIfExists('cashiers');
        Schema::dropIfExists('cashier_roles');
    }
}
