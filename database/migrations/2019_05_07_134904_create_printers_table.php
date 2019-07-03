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
            $table->string('geptipus');
            $table->unsignedInteger('ceg_id');
            $table->string('hely')->nullable($value = true);
            $table->string('elozohely')->nullable($value = true);
            $table->string('telefon')->nullable($value = true);
            $table->boolean('df')->default(0);
            $table->boolean('duplex')->default(0);
            $table->boolean('gepasztal')->default(0);
            $table->boolean('egytalca')->default(0);
            $table->boolean('kettotalca')->default(0);
            $table->boolean('lct')->default(0);
            $table->boolean('szorter')->default(0);
            $table->boolean('nyomtato')->default(0);
            $table->boolean('halo')->default(0);
            $table->boolean('scan')->default(0);
            $table->boolean('fax')->default(0);
            $table->boolean('hdd')->default(0);
            $table->bigInteger('beszer_ar')->default(0);
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
