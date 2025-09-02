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
        Schema::create('sub_folders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folder_id'); // FK to parent folder
            $table->string('name'); // Sub-folder name
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_folders');
    }
};
