<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => 'タイトル',
        'user_name'  => '名前',
        'body'  => '本文',
    ];
});
