<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advertisement_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            //IDX
            $table->index('advertisement_id', 'advertisement_tag_advertisement_idx');
            $table->index('tag_id', 'advertisement_tag_tag_idx');
            //FK
            $table->foreign('advertisement_id', 'advertisement_tag_advertisement_fk')->on('advertisements')->references('id');
            $table->foreign('tag_id', 'advertisement_tag_tag_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisement_tags');
    }
}
