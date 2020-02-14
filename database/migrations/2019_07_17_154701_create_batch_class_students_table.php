<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchClassStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_class_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('batch_class_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger( 'updated_by')->nullable();
            $table->timestamps();

            $table->foreign('batch_class_id')
                ->references('id')->on('batch_classes')
                ->onUpdate('cascade');
            $table->foreign('student_id')
                ->references('id')->on('students')
                ->onUpdate('cascade');
            $table->foreign('section_id')
                ->references('id')->on('sections')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('batch_class_students');
    }
}
