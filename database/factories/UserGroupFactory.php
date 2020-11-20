<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\UserGroup;
use Faker\Generator as Faker;

$factory->define(UserGroup::class, function (Faker $faker) {
    return [
        //
        'group_name' => '超级管理员'
    ];
});
