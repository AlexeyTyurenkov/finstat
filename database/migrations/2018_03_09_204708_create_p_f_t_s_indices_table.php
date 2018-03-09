<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePFTSIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_f_t_s_indices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('current');
            $table->string('max52');
            $table->string('min52');
            $table->string('previous');
            $table->string('change');
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
        Schema::dropIfExists('p_f_t_s_indices');
    }
}
