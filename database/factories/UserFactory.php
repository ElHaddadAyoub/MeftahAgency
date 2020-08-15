<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'bio' => $faker->paragraph,
        'avatar' => $faker->imageUrl,
    ];
});

$factory->define(App\Subcategory::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'avatar' => $faker->imageUrl,
        'category_id' => rand(1,10),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'category_id' => rand(1,10),
        'user_id' => rand(1,10),
        'subcategory' => $faker->title,
    ];
});
