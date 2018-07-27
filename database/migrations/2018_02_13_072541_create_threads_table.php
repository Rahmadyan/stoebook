<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject',200);
            $table->string('thread',1000);
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id') // foreignKey
               ->references('id') // dari kolom id
               ->on('users') // di tabel users
               ->onUpdate('cascade') // ketika terjadi perubahan di tabel users maka akan update
               ->onDelete('restrict'); // ketika data users di hapus thread tidak ikut menghilang
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}