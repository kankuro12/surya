<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoborderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joborderitems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('particular');
            $table->decimal('length');
            $table->decimal('height');
            $table->decimal('rate');
            $table->decimal('qty');
            $table->decimal('total');
            $table->integer('status');
            $table->text('type');
            $table->text('remark');
            $table->text('image')->nullable();
            $table->unsignedBigInteger('joborder_id')->unsigned();
            $table->foreign('joborder_id')->references('id')->on('joborders')->onDelete('cascade');
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
        Schema::dropIfExists('joborderitems');
    }
}
