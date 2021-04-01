<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->string('mykid');
            $table->string('parentID');
            $table->text('patientName');
            $table->string('programType')->nullable();
            $table->integer('age');
            $table->date('dob');
            $table->string('gender');
            $table->string('oku');
            $table->text('school');
            $table->string('profilePicture');
            $table->text('branch');
            $table->integer('level1')->nullable();
            $table->integer('level2')->nullable();
            $table->integer('level3')->nullable();
            $table->integer('checkout')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
