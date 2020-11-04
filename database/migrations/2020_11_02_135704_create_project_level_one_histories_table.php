<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLevelOneHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_level_one_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_one_id')->nullable();
            $table->foreign('project_one_id')->references('id')
                ->on('project_level_ones')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->string('project_one_code')->nullable();
            $table->text('project_one_name_operation')->nullable();
            $table->double('project_one_total_money')->nullable();
            $table->text('project_one_result_need_reach')->nullable();
            $table->text('project_one_index_need_reach')->nullable();
            $table->text('project_one_note')->nullable();
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
        Schema::dropIfExists('project_level_one_histories');
    }
}
