<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLevelThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_level_threes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_two_id')->nullable();
            $table->foreign('project_two_id')->references('id')->on('project_level_twos')->onDelete('cascade');

            $table->string('project_three_code')->unique()->nullable();
            $table->text('project_three_name_operation')->nullable();
            $table->double('project_three_total_money')->nullable();
            $table->text('project_three_result_need_reach')->nullable();
            $table->text('project_three_index_need_reach')->nullable();
            $table->text('project_three_note')->nullable();

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
        Schema::dropIfExists('project_level_threes');
    }
}
