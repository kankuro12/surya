<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierBillItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplierbillitems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('particular');
            $table->decimal('rate');
            $table->decimal('qty');
            $table->decimal('total');
            $table->unsignedBigInteger('supplierbill_id');
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
        Schema::dropIfExists('supplierbillitems');
    }
}
