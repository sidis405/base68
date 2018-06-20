<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {

    // user_id
    // category_id


    $title = $faker->sentence;

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'preview' => $faker->paragraph(5),
        'body' => $faker->paragraphs(10, true),
        // 'user_id' => factory(App\User::class)->make(),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
    ];
});
