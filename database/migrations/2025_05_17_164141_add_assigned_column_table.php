<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('machine_assign_bottler', function (Blueprint $table) {
            $table->tinyInteger('assign_to_sub_machine')->nullable()->comment('0=Not Assigned, 1=Assigned')->default(0);
        });
    }

    public function down()
    {
        Schema::table('machine_assign_bottler', function (Blueprint $table) {
            //
        });
    }
};
