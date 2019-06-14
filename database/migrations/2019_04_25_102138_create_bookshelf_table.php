<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookshelfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('july_bookshelf', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zhuishu_id')->comment('追书神器图书id');
            $table->integer('biquge_id')->comment('图书在笔趣阁的id');
            $table->integer('user_id')->comment('用户id');
            $table->string('book_name')->comment('图书名称');
            $table->string('cover_url')->comment('图书封面图片');
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
        Schema::dropIfExists('july_bookshelf');
    }
}
