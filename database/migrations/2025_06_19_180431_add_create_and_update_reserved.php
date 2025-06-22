<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('room', function (Blueprint $table) {
			$table->timestamps();
//			$table->addColumn('datetime', 'created_at')->nullable();
//			$table->addColumn('timestamp', 'updated_at')->nullable();
        });
    }

    public function down(): void
    {
	    Schema::table('room', function (Blueprint $table) {
		    $table->removeColumn('datetime');
		    $table->removeColumn('datetime');
	    });
    }
};
