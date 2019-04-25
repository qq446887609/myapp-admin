<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentArticleTable extends Migration
{
    /**
     * Run the migrations.
     * 文章评论表
     * @return void
     */
    public function up()
    {
        Schema::create('july_comment_article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("article_id");
            $table->integer("user_id");
            $table->string('content',255)->comment('用户评论信息');
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
        Schema::dropIfExists('july_comment_article');
    }
}
