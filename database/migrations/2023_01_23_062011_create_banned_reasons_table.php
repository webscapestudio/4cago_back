<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannedReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banned_reasons', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('banned_reasonable_id');
            $table->string('banned_reasonable_type');
            $table->string('banned_reason')->nullable();
            $table->string('status')->nullable();
            $table->text('other_report')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banned_reasons');
    }
}
