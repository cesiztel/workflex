<?php

namespace App\Http\Api\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::with('user')->get();
    }
}