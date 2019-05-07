<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gepszam');
            $table->string('gyszam');
            $table->string('marka');
            $table->string('geptipus', '10');
            $table->unsignedInteger('ceg_id');
            $table->string('hely');
            $table->string('elozohely');
            $table->string('telefon');
            $table->boolean('df');
            $table->boolean('duplex');
            $table->boolean('gepasztal');
            $table->boolean('egytalca');
            $table->boolean('kettotalca');
            $table->boolean('lct');
            $table->boolean('szorter');
            $table->boolean('nyomtato');
            $table->boolean('halo');
            $table->boolean('scan');
            $table->boolean('fax');
            $table->boolean('hdd');
            $table->bigInteger('beszer_ar');
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
        Schema::dropIfExists('printers');
    }
}
