<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sessions;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Sessions::class, 'session', function (Faker $faker) {
    return [
      'id' => $faker->randomDigit
      'order_number' => $faker->numberBetween($min = 100, $max = 900),
      'type_of_plan' => $faker->word
      'start_of_plan' => $faker->date($format = 'Y-m-d', $max = 'now'),
      'end_of_plan' => $faker->date($format = 'Y-m-d', $max = 'now'),
      'information_on_professions' => $faker->sentence($nbWords = 3, $variableNbWords = true),
      'duration_of_execution' => $faker->randomNumber($nbDigits = NULL, $strict = false),
      'progress' => $faker->numberBetween($min = 0, $max = 100),
    ];
});
