<?php
/**
 * Created by PhpStorm.
 * User: Jernej
 * Date: 6. 09. 2018
 * Time: 17:42
 */

use Faker\Generator as Faker;
use App\Content;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'user_id' => 1,
        'tag_id' => 1,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'organization' => $faker->company,
        "description" => $faker->sentence,
    ];
});
