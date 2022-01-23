<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAreaColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasColumn('properties', 'subAreaId')) {
            Schema::table('properties', function (Blueprint $table) {
                $table->string('subAreaId')->nullable();

                // $table->foreign('subAreaId')->references('id')->on('area')->onDelete('cascade');
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
        if (Schema::hasColumn('properties', 'subAreaId')) {
            Schema::table('properties', function (Blueprint $table) {
                // $table->dropForeign(['subAreaId']);
                $table->dropColumn('subAreaId');
            });
        }
    }
}
