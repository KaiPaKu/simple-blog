<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rollen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label') -> nullable();
            $table->timestamps();
        });

        Schema::create('rechte', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label') -> nullable();
            $table->timestamps();
        });

        Schema::create('recht_rolle', function (Blueprint $table) {
            $table->integer('rolle_id')->unsigned();
            $table->integer('recht_id')->unsigned();
            $table->foreign('rolle_id')
                -> references('id')
                -> on('rollen')
                -> onDelete('cascade');
            $table->foreign('recht_id')
                -> references('id')
                -> on('rechte')
                -> onDelete('cascade');
            $table->primary(['recht_Id', 'rolle_id']);
        });

        Schema::create('rolle_user', function (Blueprint $table) {
            $table->integer('rolle_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('rolle_id')
                -> references('id')
                -> on('rollen')
                -> onDelete('cascade');
            $table->foreign('user_id')
                -> references('id')
                -> on('users')
                -> onDelete('cascade');
            $table->primary(['rolle_id', 'user_id']);
        });      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rollen');
        Schema::dropIfExists('rechte');
        Schema::dropIfExists('recht_rolle');
        Schema::dropIfExists('rolle_user');
    }
}
