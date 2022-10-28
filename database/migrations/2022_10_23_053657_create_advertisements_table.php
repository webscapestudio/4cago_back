<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('advertisement_image')->nullable();
            $table->unsignedBigInteger('category_advertisement_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('is_published')->nullable();
            $table->tinyInteger('is_banned')->nullable();
            $table->text('banned_reason')->nullable();
            $table->bigInteger('views')->nullable();
            $table->bigInteger('likes')->nullable();
            $table->bigInteger('dislikes')->nullable();
            $table->tinyInteger('term')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->timestamps();

            $table->index('category_advertisement_id', 'advertisement_category_advertisement_idx');
            $table->foreign('category_advertisement_id', 'advertisement_category_advertisement_fk')->on('categories_advertisements')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
