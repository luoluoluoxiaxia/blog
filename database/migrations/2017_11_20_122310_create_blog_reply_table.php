<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->comment('顶级回复，默认为0');
            $table->integer('blog_reply_id')->comment('回复的评论id');
            $table->integer('uid')->comment('回复的评论用户的id');
            $table->char('user_name',16)->comment('回复的评论用户的名字');
            $table->char('blog_reply_content',255)->comment('评论的内容');
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
        Schema::dropIfExists('blog_reply');
    }
}
