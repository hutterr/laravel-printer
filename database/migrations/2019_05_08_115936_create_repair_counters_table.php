<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_counters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('printer_id');
            $table->integer('fekete');
            $table->integer('szines')->nullable($value = true);
            $table->timestamps('datum')->nullable($value = true);
            $table->string('megjegyzes')->nullable($value = true);
            $table->string('technikus');
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
        Schema::dropIfExists('repair_counters');
    }
}
