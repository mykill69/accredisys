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
    $table->unsignedBigInteger('param_id'); // FK to parameters table
    $table->string('file_name');
    $table->string('file_path');
    $table->text('description')->nullable();
    $table->timestamps();

    // Foreign key should be param_id → parameters table
    $table->foreign('param_id')->references('id')->on('parameters')->onDelete('cascade');
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
