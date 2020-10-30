<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLevelTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_level_twos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_one_id')->nullable();
            $table->foreign('project_one_id')->references('id')->on('project_level_ones')->onDelete('cascade');

            $table->string('project_two_code')->unique()->nullable();
            $table->text('project_two_name_operation')->nullable();
            $table->double('project_two_total_money')->nullable();
            $table->text('project_two_result_need_reach')->nullable();
            $table->text('project_two_index_need_reach')->nullable();
            $table->text('project_two_note')->nullable();

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
        Schema::dropIfExists('project_level_twos');
    }
}
