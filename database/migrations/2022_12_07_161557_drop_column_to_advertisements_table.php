<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnToAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->dropColumn('is_published');
            $table->dropColumn('views');
            $table->dropColumn('likes');
            $table->dropColumn('dislikes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->tinyInteger('is_published')->nullable();
            $table->bigInteger('views')->nullable();
            $table->bigInteger('likes')->nullable();
            $table->bigInteger('dislikes')->nullable();
        });
    }
}
