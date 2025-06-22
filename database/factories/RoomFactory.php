<?php

namespace Database\Factories;
use Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'count_room' => Faker\Factory::create('ru_RU')->numberBetween(0, 3),
	        'floor' => Faker\Factory::create('ru_RU')->numberBetween(0, 3),
        ];
    }
}
