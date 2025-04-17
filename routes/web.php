<?php

use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FormationController as AdminFormationController;
use App\Http\Controllers\Admin\InscriptionController as AdminInscriptionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Site\FormationController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\InscriptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes du site public
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');
Route::get('/formations/{categorie:slug}', [FormationController::class, 'parCategorie'])->name('formations.categorie');
Route::get('/formation/{formation:slug}', [FormationController::class, 'show'])->name('formations.show');
Route::post('/inscription/formation/{formation}', [InscriptionController::class, 'store'])->name('inscription.store');
Route::get('/merci/{inscription}', [InscriptionController::class, 'confirmation'])->name('inscription.confirmation');
Route::get('/contact', function() { return view('site.contact'); })->name('contact');

/*
|--------------------------------------------------------------------------
| Routes du dashboard
|--------------------------------------------------------------------------
*/

// Authentification
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
});

Route::post('/admin/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Routes protégées par l'authentification
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Gestion du profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    // Gestion des catégories
    Route::resource('categories', CategorieController::class)->parameters([
        'categories' => 'categorie'
    ]);
    
    // Gestion des formations
    Route::resource('formations', AdminFormationController::class);
    Route::delete('/formations/{formation}/image', [AdminFormationController::class, 'destroyImage'])->name('formations.image.destroy');
    Route::get('/formations-template', [AdminFormationController::class, 'indexTemplate'])->name('formations.index_template');
    Route::get('/formations-template/create', [AdminFormationController::class, 'createTemplate'])->name('formations.create_template');
    
    // Gestion des inscriptions
    Route::resource('inscriptions', AdminInscriptionController::class)->except(['create', 'store']);
    Route::patch('/inscriptions/{inscription}/statut', [AdminInscriptionController::class, 'updateStatut'])->name('inscriptions.update-statut');
    Route::post('/inscriptions/{inscription}/confirmer', [AdminInscriptionController::class, 'updateStatut'])->name('inscriptions.confirmer');
    Route::post('/inscriptions/{inscription}/annuler', [AdminInscriptionController::class, 'updateStatut'])->name('inscriptions.annuler');
    
    // Statistiques
    Route::get('/statistiques', [DashboardController::class, 'statistiques'])->name('statistiques');
});

Route::get('/debug', function () {
    return view('debug');
});

Route::get('/test-fix', function () {
    $formations = \App\Models\Formation::with('categorie')->paginate(9);
    $categories = \App\Models\Categorie::all();
    return view('site.formations.index', compact('formations', 'categories'))->with('_blade.template', 'site.layouts.app_fix');
});
