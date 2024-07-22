<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/archive/{id_courrier_arrivee}', [\App\Http\Controllers\NavController::class, 'archiver'])->name('archiver');
Route::get('/download/{id}', [\App\Http\Controllers\NavController::class, 'downloadFile'])->name('downloadFile');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //admin Routes
    Route::prefix('admin')->group(function () {
        Route::get('users', [App\Http\Controllers\AdminController::class, 'show_users'])->name('users');
        Route::get('services', [App\Http\Controllers\AdminController::class, 'show_services'])->name('services');
        Route::get('add_user', [App\Http\Controllers\AdminController::class, 'add_user'])->name('add_user');
        Route::post('add_user', [App\Http\Controllers\AdminController::class, 'add_userdb'])->name('add_userdb');
        Route::get('add_service', [App\Http\Controllers\AdminController::class, 'add_service'])->name('add_service');
        Route::post('add_service', [App\Http\Controllers\AdminController::class, 'add_servicedb'])->name('add_servicedb');
        Route::post('update_user', [App\Http\Controllers\AdminController::class, 'update_user'])->name('update_user');
        Route::post('update_service', [App\Http\Controllers\AdminController::class, 'update_service'])->name('update_service');
        Route::post('update_servicedb', [App\Http\Controllers\AdminController::class, 'update_servicedb'])->name('update_servicedb');


        Route::post('update_userdb', [App\Http\Controllers\AdminController::class, 'update_userdb'])->name('update_userdb');
        Route::post('delete_user', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete_user');
        Route::post('delete_service', [App\Http\Controllers\AdminController::class, 'delete_service'])->name('delete_service');

    });
});


Route::get('/formulaire_affectation_service/{id_affectation}',[\App\Http\Controllers\NavController::class, 'afficher_formulaire'])->name('formulaire_affectation_service');
Route::post('/formulaire_affectation_service/{id_affectation}',[\App\Http\Controllers\NavController::class, 'affectationagent'])->name('traitement_agent_service');

Route::get('/archives',[\App\Http\Controllers\NavController::class, 'afficher_archives'])->name('show_archives');


Route::get('/affichetraitement',[\App\Http\Controllers\NavController::class, 'showtraitement'])->name('affichetraitement');
Route::get('/affecterservice/{id}/{id_courrier_arrivee}/{id_service}',[\App\Http\Controllers\NavController::class, 'showaffecterexistantservice'])->name('affecterservice');
Route::post('/affecterservice/{id}/{id_courrier_arrivee}/{id_service}',[\App\Http\Controllers\NavController::class, 'affecterexistantservice'])->name('affecterservice');
Route::get('/affecteragent/{id_affectation}/{id_service}', [App\Http\Controllers\NavController::class, 'showaffectation'])->name('affecteragent');
Route::post('/affecteragent/{id_affectation}', [App\Http\Controllers\NavController::class, 'affectationagent'])->name('affecteragent1');
Route::get('/recherchercourrierarriver',[\App\Http\Controllers\NavController::class, 'searcharrive'])->name('recherchercourrierarrivee');
Route::get('/recherchercourrierdepart',[\App\Http\Controllers\NavController::class, 'searchdepart'])->name('recherchercourrierdepart');
Route::get('/afficheaffectation',[\App\Http\Controllers\NavController::class, 'afficheaffectation'])->name('afficheaffectation');
Route::get('/affectation/{id}',[\App\Http\Controllers\NavController::class, 'showaffectation'])->name('affectation');
Route::post('/affectation/{id}',[\App\Http\Controllers\NavController::class, 'affecter'])->name('affectation');
Route::get('/save/{type}',[\App\Http\Controllers\NavController::class, 'show'])->name('enregistrementCourrier');
Route::post('/save/{type}',[\App\Http\Controllers\NavController::class, 'save'])->name('traitementCourrier');
Route::get('/courrier_arrivee',[\App\Http\Controllers\NavController::class, 'courrier_arrivee'])->name('courrier_arrivee');
Route::get('/courrier_depart',[\App\Http\Controllers\NavController::class, 'courrier_depart'])->name('courrier_depart');


require __DIR__.'/auth.php';
