<?php


namespace App\Models\Company;

use Illuminate\Support\Facades\DB;


class CompanyManager implements CompanyContract
{
    public function store(array $data): Company
    {
        $company = new Company($data);

        DB::transaction(function () use ($data, $company) {
            $company->save();
        });

        return $company;
    }

    public function update(array $data, int $id): Company
    {
        // TODO: Implement update() method.
    }

    public function delete(array $deleteItems): Void
    {
        // TODO: Implement delete() method.
    }
}
