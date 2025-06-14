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
        if (!Schema::hasTable("roles")) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('slug')->nullable();
                $table->boolean('panelFlag')->default(0);
                $table->boolean('appFlag')->default(0);
                $table->boolean('status')->default(1);
                $table->dateTime('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('roles', function (Blueprint $table) {
            if (!Schema::hasColumn('roles', 'name')) {
                $table->string('name')->nullable()->after('id');
            }
            if (!Schema::hasColumn('roles', 'slug')) {
                $table->string('slug')->nullable()->after('name');
            }
            if (!Schema::hasColumn('roles', 'panelFlag')) {
                $table->boolean('panelFlag')->default(0)->after('slug');
            }
            if (!Schema::hasColumn('roles', 'appFlag')) {
                $table->boolean('appFlag')->default(0)->after('panelFlag');
            }
            if (!Schema::hasColumn('roles', 'status')) {
                $table->boolean('status')->default(1)->after('appFlag');
            }
            if (!Schema::hasColumn('roles', 'deleted_at')) {
                $table->dateTime('deleted_at')->nullable()->after('status');
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
        // Schema::dropIfExists('roles');
    }
};
