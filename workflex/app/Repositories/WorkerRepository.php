<?php

namespace App\Repositories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Nette\NotImplementedException;
use Spatie\LaravelData\Data;

class WorkerRepository implements WorkerRepositoryInterface
{
    protected Worker $model;

    public function __construct(Worker $model)
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
        if (null == $worker = $this->model->find($id)) {
            throw new ModelNotFoundException("User {$id} not found");
        }

        return $worker;
    }
}