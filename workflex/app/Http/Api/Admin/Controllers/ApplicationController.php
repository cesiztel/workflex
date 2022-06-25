<?php

namespace App\Http\Api\Admin\Controllers;

use App\Http\Api\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        return "List of my applications";
    }
}