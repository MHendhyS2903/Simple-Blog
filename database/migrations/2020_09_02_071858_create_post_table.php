<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('postID');
            $table->string('judul', 50);
            $table->text('konten');
            $table->integer('labelID')->unsigned()->index();
            $table->integer('id')->unsigned()->index();
            $table->text('foto');
            $table->timestamps();

            $table->foreign('labelID')
                ->references('labelID')
                ->on('label')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
