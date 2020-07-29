<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobpicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobpictures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('path');
            $table->text('description');
            $table->unsignedBigInteger('joborderitem_id')->unsigned();
            $table->foreign('joborderitem_id')->references('id')->on('joborderitems')->onDelete('cascade');
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
        Schema::dropIfExists('jobpictures');
    }
}
