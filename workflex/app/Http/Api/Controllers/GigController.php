<?php

namespace App\Http\Api\Controllers;

use App\Repositories\GigRepositoryInterface;

class GigController extends Controller
{
    private GigRepositoryInterface $repository;

    public function __construct(GigRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }
}