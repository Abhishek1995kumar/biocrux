<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('machine_assign_sub_bottler', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bottler_id')->nullable()->comment('Foreign key from botler_master table');
            $table->bigInteger("sub_bottler_id")->nullable()->comment('Foreign key from sub_bottler_master table');
            $table->bigInteger('machine_id')->nullable()->comment('Foreign key from machine_master table');
            $table->bigInteger("assigned_by")->nullable()->comment('Foreign key from users table');
            $table->tinyInteger("created_by")->nullable()->comment('Foreign key from users table');
            $table->tinyInteger("updated_by")->nullable()->comment('Foreign key from users table');
            $table->tinyInteger("deleted_by")->nullable()->comment('Foreign key from users table');
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down() {
        Schema::dropIfExists('machine_assign_sub_bottler');
    }
};
