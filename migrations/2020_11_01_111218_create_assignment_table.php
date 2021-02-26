<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment', function (Blueprint $table) {

            $table->engine = "InnoDB";

            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->string('topic');
            $table->string('file');
            $table->string('submission_date');
            $table->boolean('is_assignment')->default(0);
            $table->timestamps();
        });

        Schema::table('assignment',function (Blueprint $table){
           $table->foreign('course_id')->references('id')->on('course');
           $table->foreign('semester_id')->references('id')->on('semester');
           $table->foreign('subject_id')->references('id')->on('subject');
           $table->foreign('faculty_id')->references('id')->on('faculty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('assignment');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
