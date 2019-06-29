<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'body'=> $faker->text,
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        },
        'question_id'=> function (){
            return factory(\App\Model\Question::class)->create()->id;
        }
    ];
});
