<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_dels', function (Blueprint $table) {
            $table->Integer('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('email')->uniqid();
            $table->Integer('telephone');
            $table->date('DOB');
            $table->string('year');
            $table->string('status');

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
        Schema::dropIfExists('student_dels');
    }
}
