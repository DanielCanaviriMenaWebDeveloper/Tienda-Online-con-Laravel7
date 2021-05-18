<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commets', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT');
            $table->unsignedBigInteger('user_id');
            /* $table->unsignedBigInteger('post_id'); */
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            $table->foreign('user_id')->references('id')->on('users');
            /* $table->foreign('post_id')->references('id')->on('posts'); */

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
        Schema::dropIfExists('commets');
    }
}
