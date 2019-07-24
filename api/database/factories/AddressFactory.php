<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'cep' => $faker->postcode,
        'logradouro'   => $faker->streetName,
        'number'       => $faker->buildingNumber,
        'neighborhood' => $faker->streetAddress,
        'city'         => $faker->city,
        'state'        => $faker->stateAbbr,
    ];
});
