<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeftBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('left_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link')->nullable();
            $table->string('banner_image')->nullable();
            $table->tinyInteger('published')->nullable();
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
        Schema::dropIfExists('left_banners');
    }
}
