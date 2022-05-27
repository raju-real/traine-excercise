<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_works', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('work_date');
            $table->string('week');
            $table->string('day');
            $table->string('start_time');
            $table->string('end_time')->nullable();
            $table->string('rest_time')->nullable();
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
        Schema::dropIfExists('user_works');
    }
}
