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
        Schema::create('bin_qr', function (Blueprint $table) {
            $table->id();
            $table->integer('bottler_id')->nullable();
            $table->integer('machine_id')->nullable();
            $table->longText('uniq_id')->nullable();
            $table->string('bin_name')->nullable();
             $table->string('bin_qr_url')->nullable();
            $table->longText('qr_images')->nullable();
            $table->string('bin_mobile')->nullable();
            $table->integer('bin_otp')->nullable();
            $table->string('store_code')->nullable();
            $table->string('store_manager')->nullable();
            $table->string('format')->nullable();
            $table->string('other_mobile')->nullable();
            $table->tinyInteger('bin_status')->nullable()->comment('0=Inactive, 1=Active')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('bin_qr');
    }
};
