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
        Schema::create('program', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('sub_folder_id');   // link to subfolder
    $table->string('prog_name');
    // $table->unsignedBigInteger('college_id');
    $table->string('campus');
    $table->string('level');   // e.g., undergraduate, graduate
    $table->string('status');  // e.g., active, inactive
    $table->timestamps();

    $table->foreign('sub_folder_id')->references('id')->on('sub_folders')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program');
    }
};
