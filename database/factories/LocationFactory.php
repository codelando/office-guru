<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Location::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text(1000),
        'address' => $faker->address,
        'latitude' => $faker->randomFloat(6, $min = -58.417593, $max = -58.369609),
        'longitude' => $faker->randomFloat(6, $min = -34.629177, $max = -34.583809),
        'image' => 'office-' . $faker->numberBetween(1, 3) . '.jpg',
        'website' => $faker->domainName,
        'rating_qty' => $faker->numberBetween(0,200),
        'rating_avg' => $faker->numberBetween(0,10),
    ];
});
