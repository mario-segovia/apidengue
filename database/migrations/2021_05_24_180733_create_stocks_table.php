<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('asset_id');
            $table->unsignedInteger('team_id')->nullable();
            $table->integer('current_stock')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('asset_id')->references('id')->on('assets');
            $table->foreign('team_id')->references('id')->on('entidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
