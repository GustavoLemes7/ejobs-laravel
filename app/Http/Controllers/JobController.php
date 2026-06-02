<?php

namespace App\Http\Controllers;

use App\Enums\ContractType;
use App\Enums\Modality;
use App\Models\Category;
use App\Models\Job;
use App\Enums\Status;
use App\Models\Application;
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
            'status' => Status::OPEN,
            'company_id' => $user->company->id,
            'category_id' => $validated['category_id'],
        ]);

        return redirect(route('dashboard', absolute: false));
    }

    public function listById(Job $job){

               
        $job = Job::where('id', $job->id)->get();;
        $categories = Category::all();
        $modalities = Modality::cases();
        $contract_types = ContractType::cases(); 

        return view('jobs.list', ['vagas' => $job, 'categories' => $categories,
        'modalities' => $modalities, 'contract_types' => $contract_types]);
    }

    public function listPublic(Request $request){
        
        $jobs = Job::where('status', Status::OPEN);

        if($request->filled('title'))
            $jobs->where('title', 'like', '%' . $request->title . '$');

        if($request->filled('modality'))
            $jobs->where('modality', $request->modality);

        if($request->filled('work_schedule'))
            $jobs->where('work_schedule', $request->work_schedule);

        if($request->filled('contract_type'))
            $jobs->where('contract_type', $request->contract_type);

        if($request->filled('salary'))
            $jobs->where('salary', $request->salary);

        if($request->filled('description'))
            $jobs->where('description', $request->description);

        if($request->filled('requirements'))
            $jobs->where('requirements', $request->requirements);

        if($request->filled('company_id'))
            $jobs->where('company_id', $request->company_id);

        if($request->filled('category_id'))
            $jobs->where('category_id', $request->category_id);

        if($request->filled('company_name'))
            $jobs->where('company_name', 'like', '%'. $request->company_name . '%');

        $jobs = $jobs->paginate(10)->withQueryString();

        $categories = Category::all();
        $modalities = Modality::cases();
        $contract_types = ContractType::cases(); 

        return view('jobs.list', ['vagas' => $jobs, 'categories' => $categories,
        'modalities' => $modalities, 'contract_types' => $contract_types]);

    }

    public function listBySearch(Request $request){

        $search = $request->search;
        $jobs = Job::where('status', Status::OPEN)->where(function ($query) use ($search){
            $query->where('title', 'like', "%{$search}%")
            ->orWhereHas('category', function ($q) use ($search){
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhereHas('company', function ($q) use ($search){
                $q->where('trade_name', 'like', "%{$search}%");
            });
        })->paginate(10)->withQueryString();

        $categories = Category::all();
        $modalities = Modality::cases();
        $contract_types = ContractType::cases(); 

        return view('jobs.list', ['vagas' => $jobs, 'categories' => $categories,
        'modalities' => $modalities, 'contract_types' => $contract_types]);
    }

    public function viewJob(Request $request, Job $job){
        
        $user = $request->user();
        $application = null;
        if($user){
            if($user->candidate){
                $application = Application::where('job_listing_id', $job->id)
                ->where('candidate_id', $user->candidate->id)->first();
            }
        }

        return view('jobs.show', ['job' => $job, 'application'=> $application]);
    }

    public function listByCompany(Request $request){    

        $user = $request->user();
        $jobs = Job::where('company_id', $user->id);
        return $jobs;
    }
}