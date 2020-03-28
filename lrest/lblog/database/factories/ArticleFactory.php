<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Article;
use Faker\Generator;
use Illuminate\Support\Str;


$factory->define(Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});
