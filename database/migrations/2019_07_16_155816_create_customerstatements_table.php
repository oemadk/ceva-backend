<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerstatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerstatements', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cutomer_id');
            $table->string('customer_name');
            $table->string('phone')->nullable();
            $table->string('opening_balance')->nullable();
            $table->string('ending_balance')->nullable();
            $table->date('monthly_statement_date');
            $table->double('client_balance_input')->nullable();
            $table->bigInteger('statement_status')->default('0');
            $table->bigInteger('sms_status')->default('0');
            $table->bigInteger('client_approval')->default('0');
            $table->bigInteger('link_visited')->default('0');
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
        Schema::dropIfExists('customerstatements');
    }
}
