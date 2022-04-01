<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TagArticle;
use Faker\Generator as Faker;

$factory->define(TagArticle::class, function (Faker $faker) {
    return [
        'tag_id' => $faker->randomFloat(0, 1,10),
        'article_id' => $faker->randomFloat(0, 1,20)
    ];
});
