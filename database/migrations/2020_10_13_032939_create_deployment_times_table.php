<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeploymentTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deployment_times', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_three_id')->nullable();
            $table->foreign('project_three_id')->references('id')->on('project_level_threes')->onDelete('cascade');

            $table->string('deployment_month')->unique()->nullable();
            $table->double('deployment_number_money')->nullable();
            $table->text('deployment_address')->nullable();
            $table->text('deployment_partner')->nullable();
            $table->text('deployment_description')->nullable();

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
        Schema::dropIfExists('deployment_times');
    }
}
