<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_files', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('area_id');    // FK to areas table
    $table->unsignedBigInteger('param_id');   // FK to parameters table
    $table->unsignedBigInteger('program_id'); // FK to programs table
    $table->string('file_name');
    $table->string('file_path');
    $table->timestamps();

    $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
    $table->foreign('param_id')->references('id')->on('parameters')->onDelete('cascade');
    $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
});


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_files');
    }
};
