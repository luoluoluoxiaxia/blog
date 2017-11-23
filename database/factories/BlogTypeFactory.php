<?php
/**
 * Created by PhpStorm.
 * User: majinlong
 * Date: 17-11-21
 * Time: 上午10:07
 */
$factory->define(App\BlogType::class, function (Faker\Generator $faker) {

    return [
        'user_id' => rand(1,10),
        'type_name'=> rand(1,999999)
    ];
});