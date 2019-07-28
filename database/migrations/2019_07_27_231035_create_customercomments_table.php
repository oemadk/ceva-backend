<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomercommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customercomments', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('customer_statement_id');

            $table->string('difference_in_payment_comment');
            $table->string('difference_in_amount_comment');
            $table->string('payment_not_documented_comment');
            $table->string('invoice_not_documented_comment');
            $table->string('other_comment');
 
            $table->bigInteger('difference_in_payment')->default('0');
            $table->bigInteger('difference_in_amount')->default('0');
            $table->bigInteger('payment_not_documented')->default('0');
            $table->bigInteger('invoice_not_documented')->default('0');
            $table->bigInteger('other')->default('0');

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
        Schema::dropIfExists('customercomments');
    }
}
