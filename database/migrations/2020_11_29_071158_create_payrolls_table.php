<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('earnings')->nullable();
            $table->string('deductions')->nullable();
            $table->string('basic_salary');
            $table->string('total_earning')->nullable();
            $table->string('total_deduction')->nullable();
            $table->string('gross_salary');
            $table->string('tax')->nullable();
            $table->string('net_salary')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('ispaid')->default(0);
            $table->string('genared_date');
            $table->string('month');
            $table->string('year');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
}
