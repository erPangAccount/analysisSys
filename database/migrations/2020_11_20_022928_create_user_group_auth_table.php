<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_group_auths', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('用户组权限关联表id');
            $table->bigInteger('user_group_id')->nullable(false)->comment('用户组id');
            $table->bigInteger('auth_id')->nullable(false)->comment('权限id');
            $table->timestamps();

            $table->index(['user_group_id', 'auth_id'], 'INDEX_GROUP_AUTH');

        });
        DB::statement("ALTER TABLE `user_group_auths` comment '用户组权限表关联表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_group_auth');
    }
}
