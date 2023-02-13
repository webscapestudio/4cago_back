<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('works');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('requirements');
            $table->text('tasks');
            $table->text('conditions');
            $table->text('mail_applicants');
            $table->text('mail_notifications');
            $table->text('whatsapp');
            $table->text('telegram');
            $table->string('work_image')->nullable();
            $table->unsignedBigInteger('category_work_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('is_published')->nullable();
            $table->tinyInteger('is_banned')->nullable();
            $table->text('banned_reason')->nullable();
            $table->bigInteger('views')->nullable();
            $table->bigInteger('salary_from')->nullable();
            $table->bigInteger('salary_before')->nullable();
            $table->tinyInteger('term')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('place')->nullable();
            $table->timestamps();


            $table->index('category_work_id', 'work_category_work_idx');
            $table->foreign('category_work_id', 'work_category_work_fk')->on('categories_works')->references('id');
        });
    }
}
