<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auths', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('权限id');
            $table->bigInteger('parent_id')->default(0)->nullable(false)->index('INDEX_PARENT')->comment('父权限id');    // 父权限id
            $table->string('auth_name', 50)->comment('权限名称');
            $table->string('route')->comment('权限对应的路由');
            $table->tinyInteger('level')->default(1)->nullable(false)->index('INDEX_LEVEL')->comment('权限层级');   //权限层级

            $table->timestamps();

        });
        DB::statement("ALTER TABLE `auths` comment '权限表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_grou');
    }
}
