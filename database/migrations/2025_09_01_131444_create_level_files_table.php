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
        Schema::create('level_files', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('folder_id'); // FK to level_folders table
    $table->string('file_name');
    $table->string('file_path');
    $table->text('description')->nullable();
    $table->timestamps();

    $table->foreign('folder_id')->references('id')->on('level_folders')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_files');
    }
};
