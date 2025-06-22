<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
	const FLOOR_COUNT = 3;
	const COUNT_ROOM = 10;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		for ($i = 1; $i <= self::FLOOR_COUNT; $i++) {
			for ($k = 1; $k <= self::COUNT_ROOM; $k++) {
				$room = new Room(['floor' => $i, 'count_room' => $k]);
				$room->save();
			}
		}
    }
}
