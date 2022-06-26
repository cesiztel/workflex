<?php

namespace App\Repositories;

use App\Models\Gig;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Nette\NotImplementedException;
use Spatie\LaravelData\Data;

class GigRepository implements GigRepositoryInterface
{
    protected Gig $model;

    public function __construct(Gig $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with(['user','shifts'])->get();
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
        if (null == $gig = $this->model->find($id)) {
            throw new ModelNotFoundException("Gig {$id} not found");
        }

        return $gig;
    }
}