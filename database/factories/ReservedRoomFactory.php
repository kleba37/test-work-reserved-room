<?php

namespace Database\Factories;

use App\Models\ReservedRoom;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

/**
 * @extends Factory<ReservedRoom>
 */
class ReservedRoomFactory extends Factory
{
    public function definition(): array
    {
		$reservedStart = Faker\Factory::create('ru_RU')->numberBetween(0, 7);
		$reservedEnd = Faker\Factory::create('ru_RU')->numberBetween(0, 7);
		$currentDate = new \DateTimeImmutable();

        return [
            'room_id' => Faker\Factory::create('ru_RU')->numberBetween(1, 30),
	        'reserved_at' => $currentDate->modify('-' . $reservedStart . 'days')->modify('00:00:00'),
	        'reserved_to' => $currentDate->modify('+' . $reservedEnd . 'days')->modify('00:00:00'),
	        'status' => true,
        ];
    }
}
