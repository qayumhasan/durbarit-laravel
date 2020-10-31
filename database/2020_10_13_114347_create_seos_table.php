<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id('id');
            $table->string('meta_title');
            $table->string('meta_author');
            $table->string('meta_keyword');
            $table->text('meta_description');
            $table->text('google_analitics');
            $table->text('google_verification');
            $table->text('bing_verification');
            $table->text('alexa_analytics');
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
        Schema::dropIfExists('seos');
    }
}
