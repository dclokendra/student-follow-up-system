<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('inquiry_id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->integer('obtained_marks');
            $table->text('description');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger( 'updated_by')->nullable();
            $table->timestamps();
            $table->foreign('exam_id')
                ->references('id')->on('exams')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')
                ->references('id')->on('students')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('inquiry_id')
                ->references('id')->on('inquiries')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onUpdate('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
