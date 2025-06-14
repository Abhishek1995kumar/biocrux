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
        if (!Schema::hasTable("users")) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('username')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->string('password')->nullable();
                $table->string('temp_password')->nullable();
                $table->string('default_password')->nullable();
                $table->string('role')->nullable();
                $table->string('bottler_id')->nullable();
                $table->string('sub_bottler_id')->nullable();
                $table->string('address')->nullable();
                $table->date('dob')->nullable();
                $table->string('contact_no')->nullable();
                $table->string('personal_no')->nullable();
                $table->string('user_about')->nullable();
                $table->string('profileImage')->nullable();
                $table->string('forgot_token')->nullable();
                $table->tinyInteger('created_by')->nullable();
                $table->tinyInteger('updated_by')->nullable();
                $table->tinyInteger('deleted_by')->nullable();
                $table->string('api_token')->nullable();
                $table->string('login_status')->nullable()->comment('0 = logged out, 1 = logged in')->default(0);
                $table->boolean('status')->default(1);
                $table->dateTime('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'profileImage')) {
                $table->string('profileImage')->nullable()->after('id');
            }
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name')->nullable()->after('profileImage');
            }
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'password')) {
                $table->string('password')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'default_password')) {
                $table->string('default_password')->nullable()->after('password');
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->nullable()->after('default_password');
            }
            if (!Schema::hasColumn('users', 'api_token')) {
                $table->string('api_token')->nullable()->after('role');
            }
            if (!Schema::hasColumn('users', 'login_status')) {
                $table->string('login_status')->nullable()->after('api_token');
            }
            if (!Schema::hasColumn('users', 'status')) {
                $table->boolean('status')->default(1)->after('login_status');
            }
            if (!Schema::hasColumn('users', 'deleted_at')) {
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
        //Schema::dropIfExists('users');
    }
};
