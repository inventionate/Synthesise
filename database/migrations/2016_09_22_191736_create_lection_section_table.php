<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectionSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lection_section', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lection_name', 128);
            $table->integer('section_id');
            $table->date('available_from');
            $table->date('available_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lection_section');
    }
}
