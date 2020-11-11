<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('created_by');
            $table->string('customer');
            $table->string('payment_method');
            $table->string('project');
            $table->string('tax');
            $table->string('currency');
            $table->string('invoicedate');
            $table->string('duedate');
            $table->string('invoice_no');
            $table->string('requrring_cycle');
            $table->string('purchase_order');
            $table->string('unpaid');
            $table->string('discount');
            $table->string('discount_type');
            $table->text('option');
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
        Schema::dropIfExists('custom_invoices');
    }
}
