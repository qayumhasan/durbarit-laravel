<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_counts', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('month');
            $table->string('year');
            $table->integer('present')->nullable();
            $table->integer('absent')->nullable();
            $table->integer('late')->nullable();
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
        Schema::dropIfExists('attendance_counts');
    }
}
