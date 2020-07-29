<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('date');
            $table->decimal('amount');
            $table->text('payment_type');
            $table->text('payment_info');
            $table->unsignedBigInteger('supplierbill_id')->unsigned();
            $table->foreign('supplierbill_id')->references('id')->on('supplierbills');
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
        Schema::dropIfExists('supplier_payments');
    }
}
