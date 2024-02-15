<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BigQuestion; //Model名変更
use Faker\Generator as Faker;

$factory->define(BigQuestion::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
