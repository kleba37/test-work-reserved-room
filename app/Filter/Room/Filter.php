<?php

namespace App\Filter\Room;

abstract class Filter
{
	public ?int $number = null;
	public ?bool $status = null;
	public ?\DateTimeInterface $reservedAt = null;
	public ?\DateTimeInterface $reservedTo = null;
	public ?\DateTimeInterface $createAt = null;
	public ?\DateTimeInterface $updateAt = null;
}
