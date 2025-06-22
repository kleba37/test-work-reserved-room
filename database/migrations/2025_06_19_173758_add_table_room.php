<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room', function (Blueprint $table) {
			$table->id()->primary();
			$table->integer('count_room')->default(1);
			$table->integer('floor')->nullable(false);
        });
    }

    public function down(): void
    {
        Schema::drop('room');
    }
};
