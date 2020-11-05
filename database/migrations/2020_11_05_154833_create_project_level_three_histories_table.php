<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLevelThreeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_level_three_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_three_id')->nullable();
            $table->foreign('project_three_id')->references('id')
                ->on('project_level_threes')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->string('project_three_code')->nullable();
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
        Schema::dropIfExists('project_level_three_histories');
    }
}
