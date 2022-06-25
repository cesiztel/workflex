<?php

namespace App\Http\Api\Admin\Controllers;

use App\Http\Api\Controllers\Controller;
use Illuminate\Http\Request;

class GigController extends Controller
{
    public function store(Request $request)
    {
        return $request;
    }

    public function update(Request $request, $id)
    {
        return "Publishing gig {$id}";
    }
}