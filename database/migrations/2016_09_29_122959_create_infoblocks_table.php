<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoblocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoblocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->text('content');
            $table->text('image_path')->nullable();
            $table->text('link_url')->nullable();
            $table->string('seminar_name', 256);
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
        Schema::drop('infoblocks');
    }
}
