<?php


namespace App\Models\Company;


interface CompanyContract
{

    public function store(array $data): Company;

    public function update(array $data, int $id): Company;

    public function delete(array $deleteItems): Void;

}
