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
        Schema::table('machine_masters', function (Blueprint $table) {
            $table->tinyInteger('assigned_to_botler')->nullable()->comment('0=Not Assigned, 1=Assigned')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('machine_masters', function (Blueprint $table) {
            //
        });
    }
};
