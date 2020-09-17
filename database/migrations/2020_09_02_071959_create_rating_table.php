<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->increments('ratingID');
            $table->integer('id')->unsigned()->index();
            $table->integer('postID')->unsigned()->index();
            $table->string('komen', 50);
            $table->integer('rateValue');
            $table->timestamps();

            $table->foreign('id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('postID')
            ->references('postID')
            ->on('post')
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
        Schema::dropIfExists('rating');
    }
}
