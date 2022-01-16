<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbAddPhoneSalary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasColumn('users', 'telephone')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('telephone')->nullable();
            });
        }
        if (!Schema::hasColumn('orders', 'paymentSalary')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->integer('paymentSalary');    
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        if (Schema::hasColumn('users', 'telephone')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('telephone');
            });
        }
        if (Schema::hasColumn('orders', 'paymentSalary')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('paymentSalary');    
            });
        }
    }
}
