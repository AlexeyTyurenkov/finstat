<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuySellRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_sell_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cc')->index();
            $table->string('buy')->default('');
            $table->string('buychange')->default('');
            $table->string('sale')->default('');
            $table->string('salechange')->default('');
            $table->date('day')->index();
            $table->smallInteger('type')->index();
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
        Schema::dropIfExists('buy_sell_rates');
    }
}
