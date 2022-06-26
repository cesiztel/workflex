<?php

namespace App\Repositories;

use App\Models\Company;
use Nette\NotImplementedException;
use Spatie\LaravelData\Data;

class CompanyRepository implements CompanyRepositoryInterface
{
    protected Company $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with(['user'])->get();
    }

    public function create(Data $data)
    {
        throw new NotImplementedException(self::class.':'.__FUNCTION__.' not implemented');
    }

    public function update(Data $data, $id)
    {
        throw new NotImplementedException(self::class.':'.__FUNCTION__.' not implemented');
    }

    public function delete($id)
    {
        throw new NotImplementedException(self::class.':'.__FUNCTION__.' not implemented');
    }

    public function find($id)
    {
        return $this->model->with(['user'])->findOrFail($id);
    }
}