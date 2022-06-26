<?php

namespace App\Repositories;

use App\Models\Application;
use App\Models\Gig;
use Nette\InvalidStateException;
use Nette\NotImplementedException;
use SebastianBergmann\CodeCoverage\Driver\WriteOperationFailedException;
use Spatie\LaravelData\Data;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    protected Application $model;
    private GigRepositoryInterface $gigRepository;
    private ShiftRepositoryInterface $shiftRepository;
    private WorkerRepositoryInterface $workerRepository;

    public function __construct(
        Application $model,
        GigRepositoryInterface $gigRepository,
        ShiftRepositoryInterface $shiftRepository,
        WorkerRepositoryInterface $workerRepository
    )
    {
        $this->model = $model;
        $this->gigRepository = $gigRepository;
        $this->shiftRepository = $shiftRepository;
        $this->workerRepository = $workerRepository;
    }

    public function all()
    {
        throw new NotImplementedException(self::class.':'.__FUNCTION__.' not implemented');
    }

    public function create(Data $data)
    {
        $gig = $this->gigRepository->find($data->gig_id);
        $shift = $this->shiftRepository->find($data->shift_id);
        $worker = $this->workerRepository->find($data->worker_id);

        if ($gig->status == Gig::STATUS_DRAFT) {
            throw new InvalidStateException("Not possible add application on draft status");
        }

        $application = new Application();
        $application->worker()->associate($worker->user()->get()->first());
        $application->gig()->associate($gig);
        $application->shift()->associate($shift);

        if (!$application->save()) {
            throw new WriteOperationFailedException("Save application failed");
        }

        return $application;
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