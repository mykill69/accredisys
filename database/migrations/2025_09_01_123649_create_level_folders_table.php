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
        Schema::create('level_folders', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('survey_visit_id'); // link to survey_visit
    $table->string('folder_name');
    $table->timestamps();

    $table->foreign('survey_visit_id')
    ->references('id')
    ->on('survey_visit')
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
        Schema::dropIfExists('level_folders');
    }
};
