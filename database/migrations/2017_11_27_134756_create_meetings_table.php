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
            $table->integer('alcoholic_id');
            $table->integer('patron_id');
            $table->date('date');
            $table->string('location', 200);
            $table->boolean('aloholic_ack')->default(false);
            $table->boolean('patron_ack')->default(false);
            $table->timestamps();

            // TODO
            /*
            $table->foreign('alcoholic_id')
                   ->references('id')
                   ->on('users');
            $table->foreign('patron_id')
                   ->references('id')
                   ->on('users');
            */
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
