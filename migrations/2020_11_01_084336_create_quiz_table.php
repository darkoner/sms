<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {

            $table->engine = "InnoDB";

            $table->increments('id');
            $table->integer('semester_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->string('name');
            $table->integer('total_marks');
            $table->integer('passing_marks');
            $table->string('date');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('duration');
            $table->longText('description');
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });

        Schema::table('quiz', function (Blueprint $table)
        {
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('subject_id')->references('id')->on('subject');

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
        Schema::dropIfExists('quiz');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
