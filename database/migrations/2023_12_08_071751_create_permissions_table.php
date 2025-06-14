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
        if (!Schema::hasTable("permissions")) {
            Schema::create('permissions', function (Blueprint $table) {
                $table->id();
                $table->string('panel')->nullable();
                $table->string('displayName')->nullable();
                $table->string('tab')->nullable();
                $table->string('slug')->nullable();
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('permissions', function (Blueprint $table) {
            if (!Schema::hasColumn('permissions', 'panel')) {
                $table->string('panel')->nullable()->after('id');
            }
            if (!Schema::hasColumn('permissions', 'displayName')) {
                $table->string('displayName')->nullable()->after('panel');
            }
            if (!Schema::hasColumn('permissions', 'tab')) {
                $table->string('tab')->nullable()->after('displayName');
            }
            if (!Schema::hasColumn('permissions', 'slug')) {
                $table->string('slug')->nullable()->after('tab');
            }
            if (!Schema::hasColumn('permissions', 'created_at')) {
                $table->timestamps();
            }
            if (!Schema::hasColumn('permissions', 'updated_at')) {
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
        // Schema::dropIfExists('permissions');
    }
};
