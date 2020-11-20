<?php

use App\Model\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->initAdminGroup();
    }

    public function initAdminGroup()
    {
        // 生成超级管理员组
        $userGroups = factory(UserGroup::class)->times(1)->make();
        // 添加到数据库
        UserGroup::insert($userGroups->toArray());
    }
}
