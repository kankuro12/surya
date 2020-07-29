<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->bigInteger('phone');
            $table->string('email');
            $table->decimal('salary')->nullable();
            $table->text('start_date');
            $table->string('nationality');
            $table->text('nationality_no');
            $table->string('parent_name');
            $table->string('type');
            $table->decimal('advance')->default(0.00);
            $table->text('image')->nullable();
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
        Schema::dropIfExists('saff');
    }
}
