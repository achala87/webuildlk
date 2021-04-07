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

Route::get('/list-organizations/{msg?}', [OrganizationsController::class, 'index'])->name('list-organizations');
Route::get('rate-organization/{id?}', [OrganizationsController::class, 'set_org_rating'])->name('rate-organization');
//Route::get('/list-organization', 'OrganizationsController@index')->name('list-organization');

Route::get('add-organization', [OrganizationsController::class, 'create']);
Route::post('post-organization', [OrganizationsController::class, 'store']);

Route::get('edit-organization/{id?}', [OrganizationsController::class, 'edit']);
Route::post('update-organization', [OrganizationsController::class, 'update']);

Route::get('delete-organization/{id?}', [OrganizationsController::class, 'delete']);

Route::post('upload-evidence', [OrganizationsController::class, 'store_evidence']);
Route::post('add_org_rating', [OrganizationsController::class, 'store_organization_rating'])->name('add_org_rating');
Route::get('view-organization-rating/{id?}', [OrganizationsController::class, 'view_rating']);

require __DIR__.'/auth.php';
