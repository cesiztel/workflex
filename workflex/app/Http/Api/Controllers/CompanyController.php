<?php

namespace App\Http\Api\Controllers;

use App\Models\Worker;
use App\Repositories\CompanyRepositoryInterface;

class CompanyController extends Controller
{
    public function index(CompanyRepositoryInterface $repository)
    {
        return $repository->all();
    }
}