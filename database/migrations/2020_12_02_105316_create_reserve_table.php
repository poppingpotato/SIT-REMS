<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('employee_id')->nullable();
            $table->string('eq_r_id');
            $table->integer('quantity');
            $table->string('room_id');
            $table->integer('ReservedBy_SA_ID');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserve');
    }
}
