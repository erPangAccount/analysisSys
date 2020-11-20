<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->initAdmin();
    }

    public function initAdmin()
    {
        // 生成超级管理员
        $user = factory(User::class)->times(1)->make();
        // 添加到数据库
        User::insert($user->makeVisible(['password'])->toArray());
    }
}
