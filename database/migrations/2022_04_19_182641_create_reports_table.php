<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->string('id');
            $table->string('year');
            $table->string('semesterNumber');
            $table->string('shortNameOfFaculty');
            $table->string('course');
            $table->string('groupCode');
            $table->string('fullNameOfDiscipline');
            $table->string('fioTeacher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
