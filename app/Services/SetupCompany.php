<?php

namespace App\Services;

use App\Enums\EstatePricingEnums;
use App\Enums\TasksStatusEnum;
use App\Models\Company;
use App\Models\TaskStatus;

class SetupCompany
{

    public function __construct(public Company $company)
    {
    }

    private function _createEstatePricings(): void
    {
        foreach (EstatePricingEnums::cases() as $key) {
            $this->company->priceEvaluation()->create([
                'key' => $key->val(),
                'name' => __($key->val()),
            ]);
        }

    }

    private function _createStatus(TasksStatusEnum $value): void
    {
        TaskStatus::factory()->create([
            'code' => $value->name,
            'color' => $value->value,
            'name' => $value->getArabicName(),
            'company_id' => $this->company->id
        ]);
    }

    private function _setupStatus(): void
    {
        foreach (TasksStatusEnum::cases() as $key => $value) {
            $this->_createStatus($value);
        }
    }

    public function setup(): void
    {
        $this->_setupStatus();
        $this->_createEstatePricings();
    }
}
