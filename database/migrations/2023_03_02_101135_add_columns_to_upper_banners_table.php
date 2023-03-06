<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUpperBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('upper_banners', function (Blueprint $table) {
            $table->string('banner_image_mob')->nullable();
            $table->string('banner_image_tablet')->nullable();
            $table->string('banner_image_desktop')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('upper_banners', function (Blueprint $table) {
            $table->dropColumn('banner_image_mob');
            $table->dropColumn('banner_image_tablet');
            $table->dropColumn('banner_image_desktop');
        });
    }
}
