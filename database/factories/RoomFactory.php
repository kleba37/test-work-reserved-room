<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

/**
 * @extends Factory<Room>
 */
class RoomFactory extends Factory
{
    public function definition(): array
    {
		$reservedDay = Faker\Factory::create('ru_RU')->numberBetween(0, 14);
		$currentDate = new \DateTimeImmutable();

        return [
            'number' => Faker\Factory::create('ru_RU')->numberBetween(0, 1000),
	        'reserved_at' => $currentDate,
	        'reserved_to' => $currentDate->modify('+' . $reservedDay . 'days')->modify('00:00:00'),
	        'status' => $this->faker->boolean(),
        ];
    }
}
