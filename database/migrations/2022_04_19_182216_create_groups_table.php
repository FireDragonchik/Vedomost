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
        Schema::create('groups', function (Blueprint $table) {
            $table->string('groupCode');
            $table->string('course');
            $table->string('shortNameOfFaculty');
            $table->string('formOfEducation');
            $table->string('graduateDegree');
            $table->string('numberOfStudents');
            $table->string('shortNameOfSpecialty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
};
