<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeploymentTimePlanHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deployment_time_plan_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('deployment_time_id')->nullable();
            $table->foreign('deployment_time_id')->references('id')
                ->on('deployment_times')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->integer('deployment_day_start')->nullable();
            $table->integer('deployment_month_start')->nullable();
            $table->integer('deployment_year_start')->nullable();

            $table->integer('deployment_day_end')->nullable();
            $table->integer('deployment_month_end')->nullable();
            $table->integer('deployment_year_end')->nullable();

            $table->double('deployment_number_money_operating')->nullable();
            $table->text('deployment_method_implementation')->nullable();

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
        Schema::dropIfExists('deployment_time_plan_histories');
    }
}
