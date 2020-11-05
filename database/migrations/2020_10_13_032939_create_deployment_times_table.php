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
            $table->date('deployment_month_start')->nullable();
            $table->date('deployment_month_end')->nullable();
            $table->double('deployment_number_money_initial')->nullable();
            $table->double('deployment_number_money_operating')->nullable();
            $table->double('deployment_number_money_real')->nullable();
            $table->text('deployment_index_achieved')->nullable();
            $table->text('deployment_result_achieved')->nullable();
            $table->text('deployment_address')->nullable();
            $table->text('deployment_partner')->nullable();
            $table->text('deployment_method_implementation')->nullable();
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
