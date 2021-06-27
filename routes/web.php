<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\SystemMessagesController;
use App\Http\Controllers\AntiCorruptionController;
use App\Http\Controllers\EconomyController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::redirect('/', 'en/home');

Route::get('/logintoplatform', function () {
    return redirect('/');
});

Route::post('upload_article_image', [ArticleController::class, 'upload_article_image'])->name('upload-image');



Route::group(['prefix' => '{language}'], function(){

    Route::get('home', function () {
        return view('welcome');
    })->name('home');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::get('articles', [ArticleController::class, 'index'])->name('articles');
    Route::get('article_search/{search?}', [ArticleController::class, 'article_search'])->name('article_search');
    
    Route::get('read-article/{slug?}', [ArticleController::class, 'read_article'])->name('read-article');

    Route::get('list-organizations', [OrganizationsController::class, 'index'])->name('list-organizations');

    Route::get('rate-organization/{id?}', [OrganizationsController::class, 'set_org_rating'])->name('rate-organization')->middleware('auth');

    Route::get('add-organization', [OrganizationsController::class, 'create'])->name('add-organization')->middleware('auth');
    Route::post('post-organization', [OrganizationsController::class, 'store'])->name('post-organization')->middleware('auth');

    Route::get('edit-organization/{id?}', [OrganizationsController::class, 'edit'])->name('edit-organization')->middleware('auth');
    Route::post('update-organization', [OrganizationsController::class, 'update'])->name('update-organization')->middleware('auth');

    Route::get('view-organization-rating-review/{title?}', [OrganizationsController::class, 'view'])->name('view-organization-rating-review');
    
    Route::get('delete-organization/{id?}', [OrganizationsController::class, 'delete']);

    Route::post('upload-evidence', [OrganizationsController::class, 'store_evidence']);
    Route::post('add_org_rating', [OrganizationsController::class, 'store_organization_rating'])->name('add_org_rating');
    Route::get('view-organization-rating/{id?}', [OrganizationsController::class, 'view_rating']);

    //anti-corruption
    Route::get('anti-corruption', [AntiCorruptionController::class, 'reject_corruption_pledge'])->name('anti-corruption');

    //value-added-economy
    Route::get('value-added-economy', [EconomyController::class, 'value_added_production'])->name('value-added-economy');

    //centralized-cities-environment
    Route::get('centralized-cities-environment', [EnvironmentController::class, 'centralized_cities_concept'])->name('centralized-cities-environment');

    //about us page
    Route::get('about-us', function () { return view('about-us'); })->name('about-us');

     //national dashboard
     Route::get('national-dashboard-srilanka', function () { return view('sl_dashboard'); })->name('national-dashboard-srilanka');

     //timeline
     Route::get('national-timeline-srilanka', function () { return view('sl_timeline'); })->name('national-timeline-srilanka');

     //pledge
    Route::post('make-pledge', [AntiCorruptionController::class, 'store_pledge'])->name('make-pledge')->middleware('auth');

}); //end group lang

//coming soon
Route::get('coming-soon', [SystemMessagesController::class, 'index'])->name('coming-soon');

//audit records admin dashboard
Route::get('audits', [AuditController::class, 'index']);

require __DIR__.'/auth.php';
