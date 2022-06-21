<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllQuizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_quizes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->text('description');
            $table->smallInteger('total_score');
            $table->smallInteger('total_question_num');
            $table->smallInteger('time_of_quiz');
            $table->dateTime('from');
            $table->dateTime('to');

            $table->unsignedBigInteger('groups_teacher_id');
            $table->foreign('groups_teacher_id')->references('id')->on('groups_teachers')->onDelete('cascade');

            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

            $table->smallInteger('is_publisher');
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
        Schema::dropIfExists('all_quizes');
    }
}
