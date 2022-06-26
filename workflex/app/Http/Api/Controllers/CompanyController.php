<?php

namespace App\Http\Api\Controllers;

use App\Models\Worker;
use App\Repositories\CompanyRepositoryInterface;

class CompanyController extends Controller
{
    private CompanyRepositoryInterface $repository;

    public function __construct(CompanyRepositoryInterface $repository)
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