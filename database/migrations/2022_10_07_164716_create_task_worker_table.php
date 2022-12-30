<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_worker', function (Blueprint $table) {
            $table->id();
            $table->double ('timeWork');
            $table->date('date');
            $table-> unsignedBigInteger('task_id');
            $table->unsignedBigInteger('worker_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_worker');
    }
};
