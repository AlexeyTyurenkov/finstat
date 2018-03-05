<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUxIndexCurrentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ux_index_currents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('open');
            $table->string('max');
            $table->string('min');
            $table->string('close');
            $table->string('prev');
            $table->string('openchange');
            $table->string('prevchange');
            $table->string('volume');
            $table->string('moment');
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
        Schema::dropIfExists('ux_index_currents');
    }
}
