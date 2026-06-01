<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class RegisterCompanyController extends Controller
{

    public function index(){
        return view('onboarding.company');
    }
    

    public function store(Request $request){
        
    
        $user = $request->user();

        $validated = $request->validate([
            'trade_name' => ['required', 'max:255'],
            'legal_name' => ['required', 'max:255'],
            'cnpj' => ['required', 'max:255'],
            'state_registration' => ['required', 'max:255'],
            'founded_at' => ['required', 'max:255'],
            'employee_count' => ['required', 'max:255'],
            'contact_email' => ['required', 'max:255'],
            'contact_phone' => ['required', 'max:255'],
            'website_url' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        $company = Company::updateOrCreate(
            ['user_id' => $user->id],
            [
                'trade_name' => $validated['trade_name'],
                'legal_name' => $validated['legal_name'],
                'cnpj' => $validated['cnpj'],
                'state_registration' => $validated['state_registration'],
                'founded_at' => $validated['founded_at'],
                'employee_count' => $validated['employee_count'],
                'contact_email' => $validated['contact_email'],
                'contact_phone' => $validated['contact_phone'],
                'website_url' => $validated['website_url'],
                'description' => $validated['description'],
            ]
        );

        return redirect()->route('dashboard');


        

    }
}
