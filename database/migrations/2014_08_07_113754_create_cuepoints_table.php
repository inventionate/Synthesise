<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuepointsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cuepoints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cuepoint');
            $table->string('video_videoname', 128);
            $table->integer('video_sequence_id');
            $table->string('content', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('cuepoints');
    }
}
