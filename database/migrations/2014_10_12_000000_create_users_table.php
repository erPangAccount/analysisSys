<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('用户id ');
            $table->string('name')->comment('用户名');
            $table->string('email')->unique()->comment('邮箱');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证');
            $table->string('password')->comment('密码');
            $table->bigInteger('user_group_id')->comment('用户组id,属于权限部分');    //用户组id
            $table->rememberToken();
            $table->timestamps();

            $table->index('user_group_id', 'INDEX_USER_GROUP');
            $table->index('email', 'INDEX_EMAIL');

        });
        DB::statement("ALTER TABLE `users` comment '用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
