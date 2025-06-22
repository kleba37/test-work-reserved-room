<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reserved_room', function (Blueprint $table) {
            $table->renameColumn('number', 'room_id');
        });
    }

    public function down(): void
    {
	    Schema::table('reserved_room', function (Blueprint $table) {
		    $table->renameColumn('room_id', 'number');
	    });
    }
};
