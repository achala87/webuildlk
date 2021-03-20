<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/list-organizations', [OrganizationsController::class, 'index'])->name('list-organizations');
Route::get('rate-organization/{id?}', [OrganizationsController::class, 'set_org_rating'])->name('rate-organization');
//Route::get('/list-organization', 'OrganizationsController@index')->name('list-organization');

Route::get('add-organization', [OrganizationsController::class, 'create']);
Route::post('post-organization', [OrganizationsController::class, 'store']);

Route::get('edit-organization/{id?}', [OrganizationsController::class, 'edit']);
Route::post('update-organization', [OrganizationsController::class, 'update']);

Route::get('delete-organization/{id?}', [OrganizationsController::class, 'delete']);

require __DIR__.'/auth.php';
