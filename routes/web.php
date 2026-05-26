<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Onboarding\RegisterCandidateController;
use App\Http\Controllers\Onboarding\RegisterCompanyController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Onboarding\TipoUsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user.type'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::patch('/account', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account', [AccountController::class, 'destroy'])->name('account.destroy');
   
});

Route::middleware(['auth', 'guest.onboarding'])->group(function(){
    Route::get('/selecionar-tipo', [TipoUsuarioController::class, 'index'])->name('onboarding.tipo');
    Route::post('/selecionar-tipo', [TipoUsuarioController::class, 'store'])->name('onboarding.tipo.store');
});

Route::middleware(['auth', 'register.company'])->group(function(){
    Route::get('register/company', [RegisterCompanyController::class, 'index'])->name('onboarding.company');
    Route::post('register/company', [RegisterCompanyController::class, 'store'])->name('onboarding.company.store');
});

Route::middleware(['auth', 'register.candidate'])->group(function(){
    Route::get('register/candidate', [RegisterCandidateController::class, 'index'])->name('onboarding.candidate');
    Route::post('register/candidate', [RegisterCandidateController::class, 'store'])->name('onboarding.candidate.store');
});

require __DIR__.'/auth.php';
