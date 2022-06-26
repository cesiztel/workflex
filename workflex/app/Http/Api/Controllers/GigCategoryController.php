<?php

namespace App\Http\Api\Controllers;

use App\Repositories\GigCategoryRepositoryInterface;

class GigCategoryController extends Controller
{
    public function index(GigCategoryRepositoryInterface $repository)
    {
        return $repository->all();
    }
}