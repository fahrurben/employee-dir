<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('fullname');
            $table->date('birthday');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('position');
            $table->bigInteger('department_id');
            $table->unsignedSmallInteger('status');
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('department_id', 'employee_department_id_foreign')
                ->references('id')->on('department')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
