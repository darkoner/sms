<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_question_answer', function (Blueprint $table) {
                $table->engine = "InnoDB";

                $table->increments('id');
                $table->string('answer');
                $table->integer('quiz_question_id')->unsigned();
                $table->integer('quiz_question_option_id')->unsigned();
                $table->timestamps();
            });
        Schema::table('quiz_question_answer', function (Blueprint $table)
        {
            $table->foreign('quiz_question_id')->references('id')->on('quiz_question');
            $table->foreign('quiz_question_option_id')->references('id')->on('quiz_question_option');
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
        Schema::dropIfExists('quiz_question_answer');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
