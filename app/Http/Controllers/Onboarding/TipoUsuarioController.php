<?php

namespace App\Http\Controllers\Onboarding;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    public function index()
    {
        return view('onboarding.type');
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $user->user_type = $request->user_type;
        $user->save();       

        if ($user->user_type === UserType::COMPANY){
            $company = Company::firstOrCreate(
                ['user_id' => $user->id],
                ['trade_name' => $user->name]
            ); 
        } 
        if ($user->user_type === UserType::CANDIDATE){
            $candidate = Candidate::firstOrCreate(
                ['user_id' => $user->id],
                ['full_name' => $user->name]
            );
            
        }
        
        return redirect()->route(
            $user->user_type === UserType::COMPANY
                ? 'onboarding.company'
                : 'onboarding.candidate'
        );
    }
    
}