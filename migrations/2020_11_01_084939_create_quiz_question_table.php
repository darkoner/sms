<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_question', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->increments('id');
            $table->string('question');
            $table->string('type');
            $table->integer('question_marks');
            $table->integer('quiz_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('quiz_question', function (Blueprint $table)
        {
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
        Schema::dropIfExists('quiz_question');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
