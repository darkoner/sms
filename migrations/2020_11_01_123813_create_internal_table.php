<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal', function (Blueprint $table) {

                $table->engine = "InnoDB";

                $table->increments('id');
                $table->integer('semester_id')->unsigned();
                $table->integer('subject_id')->unsigned();
                $table->integer('student_id')->unsigned();
                $table->integer('marks');
                $table->timestamps();
            });

            Schema::table('internal',function (Blueprint $table){
                $table->foreign('semester_id')->references('id')->on('semester');
                $table->foreign('student_id')->references('id')->on('student');
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
        Schema::dropIfExists('internal');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
