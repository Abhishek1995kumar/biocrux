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
        if (!Schema::hasTable("userpermissions")) {
            Schema::create('userpermissions', function (Blueprint $table) {
                $table->id();
                $table->string('userId')->nullable();
                $table->string('permission')->nullable();
                $table->timestamps();
            });
        }
        
        // add or modify columns
        Schema::table('userpermissions', function (Blueprint $table) {
            if (!Schema::hasColumn('userpermissions', 'userId')) {
                $table->string('userId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('userpermissions', 'permission')) {
                $table->string('permission')->nullable()->after('userId');
            }
            if (!Schema::hasColumn('userpermissions', 'created_at')) {
                $table->timestamps();
            }
            if (!Schema::hasColumn('userpermissions', 'updated_at')) {
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
        // Schema::dropIfExists('userpermissions');
    }
};
