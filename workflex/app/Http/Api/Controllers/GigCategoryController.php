<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\Shared\Controller;
use App\Repositories\GigCategoryRepositoryInterface;

class GigCategoryController extends Controller
{
    public function index(GigCategoryRepositoryInterface $repository)
    {
        return $repository->all();
    }
}