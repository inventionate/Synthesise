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
            $table->text('description');
            $table->string('module', 128);
            $table->string('author', 128);
            $table->string('contact', 32);
            $table->text('authorized_editors');
            $table->text('image_path');
            $table->text('info_intro')->nullable();
            $table->text('info_lections')->nullable();
            $table->text('info_texts')->nullable();
            $table->text('info_exam')->nullable();
            $table->text('info_dates')->nullable();
            $table->text('info_path')->nullable();
            $table->date('available_from');
            $table->date('available_to');
            $table->string('disqus_shortname', 64)->nullable();
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
