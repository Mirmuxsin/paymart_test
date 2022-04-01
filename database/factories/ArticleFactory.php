<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'slug' => Str::slug($faker->jobTitle, '-'),
        'img' => 'https://get.wallhere.com/photo/monochrome-abstract-symmetry-circle-spider-Arachnid-material-line-darkness-wing-1680x1050-px-computer-wallpaper-black-and-white-monochrome-photography-fractal-art-invertebrate-spider-web-570038.jpg',
        'img_mini' => 'https://get.wallhere.com/photo/monochrome-abstract-symmetry-circle-spider-Arachnid-material-line-darkness-wing-1680x1050-px-computer-wallpaper-black-and-white-monochrome-photography-fractal-art-invertebrate-spider-web-570038.jpg',
        'text' => $faker->sentence(100),
        'views' => $faker->randomFloat(0, 0, 999),
        'likes' => $faker->randomFloat(0, 0,999),
        'created_at' => $faker->dateTime(),
    ];
});
