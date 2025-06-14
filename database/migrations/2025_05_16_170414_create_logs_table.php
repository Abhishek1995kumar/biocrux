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
        Schema::create('query_perform', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('model_id')->comment('The ID of the model instance');
            $table->bigInteger('user_id')->comment('The ID of the user who performed the action');
            $table->string('model')->comment('The model on which the action was performed');
            $table->string('action')->comment('The action performed');
            $table->string('ip_address')->comment('The IP address of the user');
            $table->string('type')->comment('The type of action performed')->comment('create, update, delete');
            $table->text('changes')->nullable()->comment('The changes made during the action');
            $table->text('old_values')->nullable()->comment('The old values before the action');
            $table->text('new_values')->nullable()->comment('The new values after the action');
            $table->string('status')->default('pending')->comment('The status of the log entry')->comment('pending, success, failed');
            $table->string('error_message')->nullable()->comment('Any error message if the action failed');
            $table->string('error_code')->nullable()->comment('Any error code if the action failed');
            $table->string('error_trace')->nullable()->comment('The error trace if the action failed');
            $table->string('context')->nullable()->comment('Additional context for the log entry');
            $table->string('created_by')->nullable()->comment('The user who created the log entry');
            $table->string('updated_by')->nullable()->comment('The user who updated the log entry');
            $table->string('deleted_by')->nullable()->comment('The user who deleted the log entry');
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
        Schema::dropIfExists('query_perform');
    }
};
