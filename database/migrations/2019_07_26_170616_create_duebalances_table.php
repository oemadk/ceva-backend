<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuebalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duebalances', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cutomer_id');
            $table->string('customer_name');
            $table->double('due_balance');
            $table->double('overdue_balance');
            $table->date('due_date');
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
        Schema::dropIfExists('duebalances');
    }
}
