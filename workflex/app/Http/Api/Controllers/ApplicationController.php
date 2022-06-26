<?php

namespace App\Http\Api\Controllers;

use App\Data\ApplicationData;
use App\Http\Api\Shared\Controller;
use App\Repositories\ApplicationRepositoryInterface;

class ApplicationController extends Controller
{
    public function store(
        ApplicationRepositoryInterface $repository,
        ApplicationData $data,
        $id)
    {
        $data->gig_id = $id;

        return $repository->create($data);
    }
}