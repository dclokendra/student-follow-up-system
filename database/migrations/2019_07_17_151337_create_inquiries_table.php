<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('permanent_address');
            $table->string('temporary_address');
            $table->string('parent_name');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->boolean('selection_status')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('batch_id')
                ->references('id')->on('batchs')
                ->onUpdate('cascade');
            $table->foreign('class_id')
                ->references('id')->on('classes')
                ->onUpdate('cascade');
            $table->foreign('exam_id')
                ->references('id')->on('exams')
                ->onUpdate('cascade');
            $table->foreign('created_by')
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
        Schema::dropIfExists('inquiries');
    }
}
