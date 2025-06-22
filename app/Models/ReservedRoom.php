<?php

namespace App\Models;

use Database\Factories\ReservedRoomFactory;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservedRoom extends Model
{
    /** @use HasFactory<ReservedRoomFactory> */
    use HasFactory, HasRelationships;

	/**
	 * @var string
	 */
	protected $table = 'reserved_room';

	protected $fillable = [
		'room_id',
		'reserved_at',
		'reserved_to',
		'status'
	];

	public function room(): BelongsTo
	{
		return $this->belongsTo(Room::class, 'room_id');
	}
}
