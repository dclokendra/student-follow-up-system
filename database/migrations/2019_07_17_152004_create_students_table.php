<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_code');
            $table->unsignedBigInteger('inquiry_id');
            $table->string('name');
            $table->string('photo');
            $table->date('dob_bs');
            $table->date('dob_ad');
            $table->string('gender');
            $table->bigInteger('phone');
            $table->string('email')->nullable();
            $table->string('permanent_address');
            $table->string('temporary_address');
            $table->string('nationality');
            $table->string('blood_group');
            $table->string('religion');
            $table->date('register_date');
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger( 'updated_by')->nullable();
            $table->timestamps();

            $table->foreign('inquiry_id')
                ->references('id')->on('inquiries')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parent_id')
                ->references('id')->on('parents')
                ->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('students');
    }
}
