<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment('用户id');
            $table->integer('notice_num')->default(0)->comment('系统通知数量');
            $table->integer('reply_num')->default(0)->comment('评论通知数量');
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
        Schema::dropIfExists('users_notice');
    }
}
