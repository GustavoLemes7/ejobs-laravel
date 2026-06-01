<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use Illuminate\Http\Request;

class RegisterCandidateController extends Controller
{

    public function index(){
        return view('onboarding.candidate');
    }
    

    public function store(Request $request){
        
    
        $user = $request->user();

        $validated = $request->validate([
            'full_name' => ['required', 'max:255'],
            'cpf' => ['required', 'max:255'],
            'birth_date' => ['required', 'max:255']
        ]);

        $candidate = Candidate::updateOrCreate([
            'user_id' => $user->id,
            'full_name' => $validated['full_name'],
            'cpf' => $validated['cpf'],
            'birth_date' => $validated['birth_date']
            
        ]);

        return redirect()->route('dashboard');


        

    }
}
