<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Client::class, function (Faker $faker) {
    $faker->locale = 'ms_MY';
    return [
        'name' => $faker->name,
        'ic_number' => $faker->numerify('############'),
        'phone' => $faker->numerify('##########'),
        'address' => $faker->address,
        'ic_front' => 'https://serving.photos.photobox.com/604750033a2591195db4455e385708c5cefe6a4eee891d90c245b7f66ab6d3374a7f40fa.jpg',
        'ic_back' => 'https://serving.photos.photobox.com/61723124db8920d140ab52cf6d3b61eb36b006407ccd51047deb6faf38970e6c66869624.jpg'
    ];
});
