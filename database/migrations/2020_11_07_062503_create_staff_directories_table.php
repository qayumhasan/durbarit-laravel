<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_directories', function (Blueprint $table) {
            $table->id();
            $table->string('staff_no');
            $table->string('role');
            $table->string('department_id');
            $table->string('designation_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('email')->unique();
            $table->string('gender_id');
            $table->string('date_of_birth');
            $table->string('date_of_joining');
            $table->string('mobile');
            $table->string('marital_status');
            $table->string('emergency_mobile')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('image')->default('employe.jpg');
            $table->text('current_address');
            $table->text('permanent_address');
            $table->text('qualification');
            $table->text('experience')->nullable();
            
            $table->string('epf_no')->nullable();
            $table->string('basic_salary')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('location')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_brach')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twiteer_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instragram_url')->nullable();
            $table->string('resume')->nullable();
            $table->string('joining_letter')->nullable();
            $table->string('other_document')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('staff_directories');
    }
}
