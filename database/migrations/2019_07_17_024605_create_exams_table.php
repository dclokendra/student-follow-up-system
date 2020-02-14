<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exam_type_id');
            $table->string('title');
            $table->date('exam_date');
            $table->Time('exam_time');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger( 'updated_by')->nullable();
            $table->timestamps();

            $table->foreign('exam_type_id')
                ->references('id')->on('exam_types')
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
        Schema::dropIfExists('exams');
    }
}
