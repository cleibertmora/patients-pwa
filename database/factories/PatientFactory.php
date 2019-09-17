<?php

use Faker\Generator as Faker;
use App\Patient;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'nombre'     => $faker->name,
        'email'      => $faker->unique()->safeEmail,
        'cedula'     => str_random(10),
        'direccion'  => $faker->address,
        'doctype'    => 'ced',
        'celular'    => $faker->tollFreePhoneNumber,
        'telefono'   => $faker->tollFreePhoneNumber,
        'foto'       => '',
        'datosFamiliares' => '',
        'clinic_id'  => 1
    ];
});
