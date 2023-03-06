<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

// $factory->define(Service::class, function (Faker $faker) {
//     return [
//         "name" => 'Front-end developer',
//         "icon" => 'uil uil-brackets=curly',
//         "description" => 'Service description....'
//     ];
// });
class ServiceFactory extends EloquentFactory
{
    public function definition(){
    return [
        "name" => 'Front-end developer',
        "icon" => 'uil uil-brackets=curly',
        "description" => 'Service description....'
    ];
}
}
