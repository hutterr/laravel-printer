<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsedPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_parts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('db');
            $table->unsignedInteger('printer_id')->nullable($value = false);
            $table->unsignedBigInteger('parts_id')->nullable($value = false);
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
        Schema::dropIfExists('used_parts');
    }
}
