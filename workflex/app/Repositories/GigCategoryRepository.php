<?php

namespace App\Repositories;

use App\Models\GigCategory;
use Nette\NotImplementedException;
use Spatie\LaravelData\Data;

class GigCategoryRepository implements GigCategoryRepositoryInterface
{
    protected GigCategory $model;

    public function __construct(GigCategory $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with('gigSubCategory')->get();
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
        throw new NotImplementedException(self::class.':'.__FUNCTION__.' not implemented');
    }
}