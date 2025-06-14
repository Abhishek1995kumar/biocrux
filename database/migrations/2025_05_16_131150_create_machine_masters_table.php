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
        Schema::create('machine_masters', function (Blueprint $table) {
            $table->id();
            $table->string('machine_name')->nullable()->comment('Machine name');
            $table->string('machine_number')->nullable()->comment('Machine number');
            $table->string('machine_code')->nullable()->comment('Machine code');
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('pincode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable()->comment('state name');
            $table->tinyInteger('installed')->nullable()->comment('	0=not installed, 1=installed');
            $table->longText('machine_image')->nullable();
            $table->tinyInteger('created_by')->nullable()->comment('User ID who created the record');
            $table->tinyInteger('updated_by')->nullable()->comment('User ID who updated the record');
            $table->tinyInteger('deleted_by')->nullable()->comment('User ID who deleted the record');
            $table->tinyInteger('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->softDeletes()->comment('Soft delete column');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_masters');
    }
};
