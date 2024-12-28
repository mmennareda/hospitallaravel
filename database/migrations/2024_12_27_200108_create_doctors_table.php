<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doc_image');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('department');
            $table->enum('gender',['female','male']);
            $table->string('phone');
            $table->string('address');
            $table->integer('age');
            $table->string('days');
            $table->string('time');
            $table->integer('Consultancyfees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
