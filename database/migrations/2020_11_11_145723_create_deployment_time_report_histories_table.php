<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeploymentTimeReportHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deployment_time_report_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('deployment_time_id')->nullable();
            $table->foreign('deployment_time_id')->references('id')
                ->on('deployment_times')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->double('deployment_number_money_real')->nullable();
            $table->text('deployment_index_achieved')->nullable();
            $table->text('deployment_result_achieved')->nullable();

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
        Schema::dropIfExists('deployment_time_report_histories');
    }
}
