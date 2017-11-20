<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersNoticeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_notice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->comment('消息类型：1为系统通知，2为评论通知');
            $table->char('content',255)->comment('如果type为1,则是完整的系统通知，如果type为2，则是评论id，通过评论id找到评论详情');
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
        Schema::dropIfExists('users_notice_details');
    }
}
