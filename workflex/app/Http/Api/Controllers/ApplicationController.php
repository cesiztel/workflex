<?php

namespace App\Http\Api\Controllers;

use App\Data\ApplicationData;
use App\Repositories\ApplicationRepositoryInterface;
use Illuminate\Http\Request;

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