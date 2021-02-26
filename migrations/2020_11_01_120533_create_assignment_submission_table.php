<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentSubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_submission', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->increments('id');
            $table->integer('assignment_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->string('file');
            $table->string('date');
            $table->boolean('is_checked')->default(0);
            $table->boolean('is_complete')->default(0);
            $table->integer('marks');
            $table->timestamps();
        });

        Schema::table('assignment_submission',function (Blueprint $table){
            $table->foreign('assignment_id')->references('id')->on('assignment');
            $table->foreign('student_id')->references('id')->on('student');
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
        Schema::dropIfExists('assignment_submission');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
