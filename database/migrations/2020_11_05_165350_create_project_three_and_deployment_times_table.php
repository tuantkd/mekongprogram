<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectThreeAndDeploymentTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_three_and_deployment_times', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_three_id')->nullable();
            $table->foreign('project_three_id')->references('id')
                ->on('project_level_threes')->onDelete('cascade');

            $table->unsignedBigInteger('deployment_time_id')->nullable();
            $table->foreign('deployment_time_id')->references('id')
                ->on('deployment_times')->onDelete('cascade');

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
        Schema::dropIfExists('project_three_and_deployment_times');
    }
}
