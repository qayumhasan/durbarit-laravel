<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeapeAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leape_applies', function (Blueprint $table) {
            $table->id();
            $table->string('apply_date');
            $table->string('leave_type');
            $table->string('leave_form');
            $table->string('leave_to');
            $table->string('reason');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('leape_applies');
    }
}
