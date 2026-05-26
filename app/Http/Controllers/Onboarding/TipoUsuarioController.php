<?php

namespace App\Http\Controllers\Onboarding;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
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

        if ($user->user_type === UserType::COMPANY) {
            return redirect('/register/company');
        }

        return redirect('/register/candidate');
    }
}