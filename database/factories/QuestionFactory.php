<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    $title=$faker->word;
    return [
        'title'=>$title,
        'slug'=>str_slug($title),
        'body'=>$faker->paragraph(2),
        'category_id'=>function(){
            return factory(\App\Model\Category::class)->create()->id;
        },
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        }
    ];
});
