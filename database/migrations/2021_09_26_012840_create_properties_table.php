<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('price');
            $table->string('address');
            $table->string('image');
            $table->boolean('sold')->default(false);
            $table->integer('status');
            $table->integer('category');
            $table->integer('bedRoom');
            $table->integer('bathRoom');
            $table->integer('parkingLot');
            $table->integer('heating');
            $table->integer('length');
            $table->integer('width');
            $table->longText('description');
            $table->integer('subSalaryId');
            $table->integer('subHomeFurnitureId');
            $table->integer('subFamilyMemberId');
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
        Schema::dropIfExists('properties');
    }
}
