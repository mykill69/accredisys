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
       Schema::create('programs', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('sub_folder_id');
    $table->string('prog_name');
    $table->string('campus');
    $table->string('level');
    $table->string('status');
    $table->string('code')->nullable()->unique();
    $table->timestamps();

    $table->foreign('sub_folder_id')
          ->references('id')->on('sub_folders')
          ->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
