<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeploymentTimeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deployment_time_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('deployment_time_id')->nullable();
            $table->foreign('deployment_time_id')->references('id')
                ->on('deployment_times')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->integer('deployment_month_initialize')->nullable();
            $table->integer('deployment_year_initialize')->nullable();
            //$table->date('deployment_month_start')->nullable();
            //$table->date('deployment_month_end')->nullable();
            $table->double('deployment_number_money_initial')->nullable();
            //$table->double('deployment_number_money_operating')->nullable();
            //$table->double('deployment_number_money_real')->nullable();
            //$table->text('deployment_index_achieved')->nullable();
            //$table->text('deployment_result_achieved')->nullable();
            $table->text('deployment_address')->nullable();
            $table->text('deployment_partner')->nullable();
            //$table->text('deployment_method_implementation')->nullable();
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
        Schema::dropIfExists('deployment_time_histories');
    }
}
