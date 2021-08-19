<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('employee_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('eq_b_id');
            $table->integer('quantity');
            $table->dateTime('start');
            $table->integer('ReleasedBy_SA_ID');
            $table->dateTime('end');
            $table->integer('RecievedBy_SA_ID');
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
        Schema::dropIfExists('borrow');
    }
}
