<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('room', function (Blueprint $table) {
            $table->rename('reserved_room');
        });
    }

    public function down(): void
    {
        Schema::table('room', function (Blueprint $table) {
	        $table->rename('room');
        });
    }
};
