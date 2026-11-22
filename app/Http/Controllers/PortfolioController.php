<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio', [
            'projects' => Project::orderBy('id')->get(),
        ]);
    }
}
