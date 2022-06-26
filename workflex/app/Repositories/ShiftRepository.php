<?php

namespace App\Repositories;

use App\Models\Shift;
use Nette\NotImplementedException;
use Spatie\LaravelData\Data;

class ShiftRepository implements ShiftRepositoryInterface
{
    protected Shift $model;

    public function __construct(Shift $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        throw new NotImplementedException(self::class.':'.__FUNCTION__.' not implemented');
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
        return $this->model->findOrFail($id);
    }
}