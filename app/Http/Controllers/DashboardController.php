<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller{

    public function index(Request $request)
{
    $user = $request->user();

    $company = $user->company; // se existir relacionamento

    $jobs = $company?->jobs ?? collect();

    return view('dashboard.index', [
        'company' => $company,
        'jobs' => $jobs,
        'jobsCount' => $jobs->count(),
    ]);
}
}