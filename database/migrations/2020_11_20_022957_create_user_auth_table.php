<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_auths', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('用户权限表id');
            $table->bigInteger('user_id')->nullable(false)->comment('用户id');
            $table->bigInteger('auth_id')->nullable(false)->comment('权限id');
            $table->timestamps();

            $table->index(['user_id', 'auth_id'], 'INDEX_USER_AUTH');

        });
        DB::statement("ALTER TABLE `user_auths` comment '用户权限关联表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_auth');
    }
}
