<?php

use Faker\Generator as Faker;

/**
 * Definimos a forma de povoação das tabelas onde os campos
 * name é gerador por faker (gerador aleatorio) do tipo nome
 * email é gerado aleatorio, unico e do tipo email
 * telefone e cep aleatorios com 11 e 8 caracteres respectivamente
 */
$factory->define(App\ContatoModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,    
        'telefone' => str_random(11),
        'cep' => str_random(8),
    ];
});
