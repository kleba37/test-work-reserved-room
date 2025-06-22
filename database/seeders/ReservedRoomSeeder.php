<?php

namespace Database\Seeders;

use App\Models\ReservedRoom;
use Illuminate\Database\Seeder;

class ReservedRoomSeeder extends Seeder
{
    public function run(): void
    {
		ReservedRoom::factory()->count(10)->create();
    }
}
