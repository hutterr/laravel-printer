<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCegeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cegek', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cegnev');
            $table->bigInteger('adoszam');
            $table->string('cim');
            $table->string('telefon');
            $table->string('kapcsolattarto');
            $table->string('kapcstel');
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
        Schema::dropIfExists('cegek');
    }
}
