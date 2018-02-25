<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdrpouRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edrpou_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('edrpou');
            $table->string('name',1000);
            $table->string('kved');
            $table->string('address');
            $table->string('stan');
            $table->string('boss');
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
        Schema::dropIfExists('edrpou_records');
    }
}
