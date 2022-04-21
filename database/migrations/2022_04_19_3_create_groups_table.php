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
            $table->id();
            $table->string('groupCode');
            $table->foreignId('course_id')->constrained();
            $table->foreignId('form_of_education_id')->constrained();
            $table->foreignId('graduate_degree_id')->constrained();
            $table->string('numberOfStudents');
            $table->foreignId('specialty_id')->constrained();
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
