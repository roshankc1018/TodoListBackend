<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('taskid');
            $table->string('taskanme');
            $table->string('projectid');
            $table->string('userid');
            $table->string('hours');
            $table->foreign('projectid')
                ->references('projectid')->on('projects')
                ->onDelete('cascade');
            $table->foreign('userid')
                ->references('userid')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
