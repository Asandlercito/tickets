<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
class Ticket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('ticket', function (Blueprint $table){
          $table->increments('id');
          $table->string('nombre');
          $table->string('descripcion');
          $table->integer('estadoTicket_id')->unsigned()->index();
          $table->foreign('estadoTicket_id')->references('id')->on('estado_ticket');
          $table->integer('users_id')->unsigned()->index();
          $table->foreign('users_id')->references('id')->on('users');
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
        Schema::drop('ticket');
    }
}
