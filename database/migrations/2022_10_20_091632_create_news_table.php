<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description', 255);
            $table->text('content')->nullable();
            $table->string('news_image')->nullable();
            $table->tinyInteger('is_published')->nullable();
            $table->tinyInteger('is_banned')->nullable();
            $table->text('banned_reason')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('views')->nullable();
            $table->bigInteger('likes')->nullable();
            $table->bigInteger('dislikes')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('news');
    }
}
