<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndingbalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endingbalances', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cutomer_id');
            $table->string('customer_name');
            $table->string('ending_balance_comment')->nullable();
            $table->date('ending_balance_date');
            $table->double('ending_balance');
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
        Schema::dropIfExists('endingbalances');
    }
}
