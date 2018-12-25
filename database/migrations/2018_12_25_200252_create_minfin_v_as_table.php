<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinfinVAsTable extends Migration
{
    /**
     * Run the migrations.
     *            $model->currency = $currency;
    $model->ask = data_get($model,"ask");
    $model->bid = data_get($model,"bid");
    $model->askCount = data_get($model,"askCount");
    $model->bidCount = data_get($model,"bidCount");
    $model->askSum = data_get($model,"askSum");
    $model->bidSum = data_get($model,"bidSum");
    $model->date = new \DateTime('now');
     * @return void
     */
    public function up()
    {
        Schema::create('minfin_v_as', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ask');
            $table->string('askCount');
            $table->string('askSum');
            $table->string('bid');
            $table->string('bidCount');
            $table->string('bidSum');
            $table->string('currency')->index();
            $table->date('date');
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
        Schema::dropIfExists('minfin_v_as');
    }
}
