<?php

namespace App\Http\Api\Controllers;

class GigController extends Controller
{
    public function index()
    {
        return "List of gigs";
    }

    public function show($id)
    {
        return "Show only the the gig {$id}";
    }
}