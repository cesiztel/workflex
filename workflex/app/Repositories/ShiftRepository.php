<?php

namespace App\Repositories;

use App\Models\Application;
use App\Models\Gig;
use App\Models\Shift;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Nette\InvalidStateException;
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
        if (null == $shift = $this->model->find($id)) {
            throw new ModelNotFoundException("Shift {$id} not found");
        }

        return $shift;
    }
}