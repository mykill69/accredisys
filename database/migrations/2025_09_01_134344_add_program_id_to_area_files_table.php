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
    Schema::table('area_files', function (Blueprint $table) {
        $table->unsignedBigInteger('program_id')->after('param_id')->nullable();

        $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('area_files', function (Blueprint $table) {
        $table->dropForeign(['program_id']);
        $table->dropColumn('program_id');
    });
}

};
