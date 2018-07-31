<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned()->nullable();
            $table->string('subject')->nullable();
            $table->timestamp('initialised')->nullable();
            $table->timestamp('start_meet')->nullable();
            $table->timestamp('end_meet')->nullable();
            $table->integer('status')->default(0);
            $table->boolean('atttendance')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('meetings');
    }
}
