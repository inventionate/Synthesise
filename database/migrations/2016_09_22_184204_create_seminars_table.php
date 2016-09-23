<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('subject', 256);
            $table->string('module', 128);
            $table->string('author', 128);
            $table->json('authorized_editors');
            $table->text('image_path');
            $table->text('info_path');
            $table->date('available_from');
            $table->date('available_to');
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
        Schema::drop('seminars');
    }
}
