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
        if (!Schema::hasTable("rolepermissions")) {
            Schema::create('rolepermissions', function (Blueprint $table) {
                $table->id();
                $table->string('roleSlug')->nullable();
                $table->string('permission')->nullable();
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('rolepermissions', function (Blueprint $table) {
            if (!Schema::hasColumn('rolepermissions', 'roleSlug')) {
                $table->string('roleSlug')->nullable()->after('id');
            }
            if (!Schema::hasColumn('rolepermissions', 'permission')) {
                $table->string('permission')->nullable()->after('roleSlug');
            }
            if (!Schema::hasColumn('rolepermissions', 'created_at')) {
                $table->timestamps();
            }
            if (!Schema::hasColumn('rolepermissions', 'updated_at')) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('rolepermissions');
    }
};
