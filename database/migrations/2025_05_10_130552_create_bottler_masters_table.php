<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('bottler_masters', function (Blueprint $table) {
            $table->id();
            $table->string("bottler_name")->nullable();
            $table->longText("company_logo")->nullable();
            $table->longText("machine_logo")->nullable();
            $table->longText("bottle_logo")->nullable();
            $table->string("color_code")->nullable();
            $table->string("company_url")->nullable();
            $table->string("company_name")->nullable();
            $table->string("created_by")->nullable();
            $table->string("updated_by")->nullable();
            $table->string("deleted_by")->nullable();
            $table->tinyInteger("status")->default(1)->comment('1=Enable, 0=Disable');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('bottler_masters');
    }
};
