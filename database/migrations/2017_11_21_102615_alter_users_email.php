<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //删除无用的字段
            $table->dropColumn('last_login_at');
            //新增了邮箱
            $table->char('email',50)->nullable()->comment('邮箱');
            //新增了密码
            $table->char('password',50)->nullable()->comment('密码');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
