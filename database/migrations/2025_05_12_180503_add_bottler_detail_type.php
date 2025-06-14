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
    public function up() {
        Schema::table('bottler_masters', function (Blueprint $table) {
            $table->string('bottler_detail_type')->nullable()->after('company_name');
        });
    }

    public function down() {
        Schema::table('bottler_masters', function (Blueprint $table) {
            //
        });
    }
};
