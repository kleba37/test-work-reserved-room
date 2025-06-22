<?php

namespace App\Http\Requests;

use App\DTO\Room\ReservedPeriodDTO;
use Illuminate\Foundation\Http\FormRequest;

class ReservedPeriodRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
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
		$dateFrom = $this->input('dateFrom');

		if (empty($dateFrom)) {
			$dateFrom = new \DateTimeImmutable();
		}

		$dateTo = $this->input('dateTo');

		if (empty($dateTo)) {
			$dateTo = new \DateTimeImmutable('+7 days');
		}

		return new ReservedPeriodDTO(
			dateFrom: $dateFrom,
			dateTo: $dateTo
		);
	}
}
