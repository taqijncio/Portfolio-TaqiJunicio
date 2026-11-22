<?php

namespace App\Http\Controllers;

use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'projects' => Project::orderBy('id', 'desc')->get(),
        ]);
    }
}
