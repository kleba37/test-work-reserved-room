<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
		Schema::create('room', function (Blueprint $table) {
			$table->id();
			$table->smallInteger('number');
			$table->dateTime('reserved_at')->nullable();
			$table->dateTime('reserved_to')->nullable();
			$table->timestamps();
		});
    }

    public function down(): void
    {
        Schema::drop('room');
    }
};
