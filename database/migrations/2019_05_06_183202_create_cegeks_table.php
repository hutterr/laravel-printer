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
            $table->bigInteger('adoszam')->nullable($value = true);
            $table->string('cim');
            $table->string('telefon')->nullable($value = true);
            $table->string('kapcsolattarto')->nullable($value = true);
            $table->string('kapcstel')->nullable($value = true);
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
