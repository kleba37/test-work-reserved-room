<?php

namespace App\Http\Requests;

use App\DTO\Room\ReservedPeriodDTO;
use Illuminate\Foundation\Http\FormRequest;

class ReservedPeriodRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dateFrom' => 'nullable|date',
            'dateTo' => 'nullable|date',
        ];
    }

	/**
	 * @throws \Exception
	 */
	public function toDTO(): ReservedPeriodDTO
	{
		$dateFrom = !empty($this->input('dateFrom')) ?
			new \DateTimeImmutable($this->input('dateFrom')) :
			new \DateTimeImmutable()
		;


		$dateTo = !empty($this->input('dateTo')) ?
			new \DateTimeImmutable($this->input('dateTo')) :
			new \DateTimeImmutable('+7 days')
		;

		return new ReservedPeriodDTO(
			dateFrom: $dateFrom,
			dateTo: $dateTo
		);
	}
}
