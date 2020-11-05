<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLevelTwoHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_level_two_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_two_id')->nullable();
            $table->foreign('project_two_id')->references('id')
                ->on('project_level_twos')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->string('project_two_code')->nullable();
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
        Schema::dropIfExists('project_level_two_histories');
    }
}
