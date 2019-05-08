<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrinterCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printer_counters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('printer_id');
            $table->integer('fekete');
            $table->integer('szines')->nullable($value = true);
            $table->date('bejelentesi_datum')->nullable($value = true);
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
        Schema::dropIfExists('printer_counters');
    }
}
