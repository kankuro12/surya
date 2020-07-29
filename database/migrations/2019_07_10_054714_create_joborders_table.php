<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joborders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('s_n');
            $table->text('date');
            $table->text('order_received_date');
            $table->text('order_delever_date');
            $table->integer('status');
            $table->decimal('grand_total');
            $table->decimal('advance')->nullable();
            $table->decimal('due')->nullable();
            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('joborders');
    }
}
