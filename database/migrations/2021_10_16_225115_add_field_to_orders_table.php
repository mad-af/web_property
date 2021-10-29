<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('propertyId');
            $table->integer('paymentMethod')->nullable();
            $table->integer('success')->nullable();
            $table->integer('bank')->nullable();
            $table->integer('prepayment')->nullable();
            $table->integer('paymentLoan')->nullable();
            $table->integer('paymentTimes')->nullable();
            $table->longText('description')->nullable();
            $table->string('proofImage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
