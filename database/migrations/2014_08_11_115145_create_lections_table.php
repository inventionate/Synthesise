<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->string('author', 128);
            $table->string('contact', 32);
            $table->text('authorized_editors');
            $table->text('image_path');
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
        Schema::drop('lections');
    }
}
