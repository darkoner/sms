<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_result', function (Blueprint $table) {

            $table->engine = "InnoDB";

            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('quiz_id')->unsigned();
            $table->integer('obtained_marks')->default(0);
            $table->boolean('is_pass')->default(0);
            $table->timestamps();
        });

        Schema::table('quiz_result', function (Blueprint $table)
        {
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('quiz_id')->references('id')->on('quiz');
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
        Schema::dropIfExists('quiz_result');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
