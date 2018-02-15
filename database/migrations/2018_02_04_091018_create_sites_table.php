<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('logo', 255)->nullable();
            $table->integer('level')->unsigned()->default(3);
            $table->integer('card_id')->unsigned();
            
            $table->foreign('card_id')->references('id')->on('cards');

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
        Schema::dropIfExists('sites');
    }
}
