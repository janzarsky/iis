<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_alcoholic')->default(false);
            $table->boolean('is_patron')->default(false);
            $table->boolean('is_specialist')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->integer('patron_id')->unsigned()->nullable();
            $table->integer('specialist_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patron_id')->references('id')->on('users');
            $table->foreign('specialist_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
