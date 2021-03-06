<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_regs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('email');
            $table->Integer('telephone');
            $table->date('DOB');
            $table->string('subject1');
            $table->string('teacher1');
            $table->string('subject2');
            $table->string('teacher2');
            $table->string('subject3');
            $table->string('teacher3');
            $table->string('subject4');
            $table->string('teacher4');
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
        Schema::dropIfExists('student_regs');
    }
}
