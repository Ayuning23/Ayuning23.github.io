<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('tempat_magangs', function (Blueprint $table) {
        $table->string('nama_tempat')->after('id');
    });
}

public function down()
{
    Schema::table('tempat_magangs', function (Blueprint $table) {
        $table->dropColumn('nama_tempat');
    });
}

};
