<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinfinMBsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minfin_m_bs', function (Blueprint $table) {
            $table->increments('k');
            $table->timestamps();
            $table->string("id")->default('');
            $table->dateTimeTz("pointDate")->nullable();
            $table->dateTimeTz("date")->nullable();
            $table->string("ask")->default('');
            $table->string("bid")->default('');
            $table->string("trendAsk")->default('');
            $table->string("trendBid")->default('');
            $table->string("currency")->default('');
            $table->string("deleted")->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minfin_m_bs');
    }
}
