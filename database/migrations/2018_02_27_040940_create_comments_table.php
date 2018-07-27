<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('body');
            $table->integer('commentable_id')->unsigned();
            $table->string('commentable_type');
            $table->timestamps();

             // $table->foreign('user_id') // foreignKey
             //   ->references('id') // dari kolom id
             //   ->on('users') // di tabel users
             //   ->onUpdate('cascade') // ketika terjadi perubahan di tabel users maka akan update
             //   ->onDelete('cascade'); // ketika data users di hapus akan ikut hilang

             //   $table->foreign('commentable_id') // foreignKey
             //   ->references('id') // dari kolom id
             //   ->on('threads') // di tabel users
             //   ->onUpdate('cascade') // ketika terjadi perubahan di tabel users maka akan update
             //   ->onDelete('cascade'); // ketika data users di hapus akan ikut hilang

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
