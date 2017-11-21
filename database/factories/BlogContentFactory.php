<?php
/**
 * Created by PhpStorm.
 * User: majinlong
 * Date: 17-11-21
 * Time: 上午10:07
 */
$factory->define(App\BlogContent::class, function (Faker\Generator $faker) {

    return [
        'user_id' => rand(1,10),
        'blog_title'=> $faker->name(20),
        'blog_content' =>  $faker->randomHtml(2,3),
        'blog_type_id' =>  rand(1,10),
        'blog_type_name' => $faker->name(20),
    ];
});