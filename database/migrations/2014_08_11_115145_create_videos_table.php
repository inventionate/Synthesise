<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('videoname', 128);
            $table->string('section', 128);
            $table->string('author', 128);
            $table->boolean('online');
            $table->integer('sequence_id')->nullable();
            $table->string('sequence_name', 128)->nullable();
            $table->date('available_from');
            $table->date('available_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('videos');
    }
}
