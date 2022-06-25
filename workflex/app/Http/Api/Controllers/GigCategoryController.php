<?php

namespace App\Http\Api\Controllers;

use App\Models\GigCategory;

class GigCategoryController extends Controller
{
    public function index()
    {
        return GigCategory::with('gigSubCategory')->get();
    }
}