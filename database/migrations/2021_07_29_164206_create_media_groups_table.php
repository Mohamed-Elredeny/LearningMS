<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_groups', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('description');

            $table->unsignedBigInteger('groups_teacher_id');
            $table->foreign('groups_teacher_id')->references('id')->on('groups_teachers')->onDelete('cascade');

            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

            $table->string('publisher_type');
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
        Schema::dropIfExists('media_groups');
    }
}
