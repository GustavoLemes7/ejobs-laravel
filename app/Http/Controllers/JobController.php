<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller{

    public function index(Request $request) : View {

        $categories = Category::all();

        return view('jobs.create', ['categories' => $categories]);
    }

    public function store(Request $request) : RedirectResponse{

        $user = $request->user();

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],

            'modality' => ['required','in:REMOTE,PRESENTIAL,HYBRID'],

            'work_schedule' => ['required','string','max:100'],

            'contract_type' => ['required','in:CLT,PJ,INTERNSHIP,FREELANCE'],

            'salary' => ['nullable','numeric','min:0'],

            'description' => ['required','string'],

            'requirements' => ['nullable','string'],

            'category_id' => ['required','exists:categories,id'],
        ]);


        Job::create([
            'title' => $validated['title'],
            'modality' => $validated['modality'],
            'work_schedule' => $validated['work_schedule'],
            'contract_type' => $validated['contract_type'],
            'salary' => $validated['salary'],
            'description' => $validated['description'],
            'requirements' => $validated['requirements'] ?? null,
            'status' => 'OPEN',
            'company_id' => $user->company->id,
            'category_id' => $validated['category_id'],
        ]);

        return redirect(route('dashboard', absolute: false));
    }

    public function ListByCategory(Request $request){
        $category_id = $request->category_id;
        $jobs = Job::where('category_id', $category_id)->paginate(10)->withQueryString();;
        return view('jobs.list', ['vagas' => $jobs]);
    }
}