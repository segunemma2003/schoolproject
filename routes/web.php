<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Models\Admin\Plant;
use App\Models\Admin\Disease;
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

Route::admineticAuth();

Route::resource('admin/plant',\App\Http\Controllers\Admin\PlantController::class);
Route::get('plant', function () {
    $searchTerm = Request::get('searchTerm');


    if (!is_null($searchTerm) || !empty($searchTerm)) {
        $plants = Plant::where('common_name', 'like', '%' . $searchTerm . '%')->paginate(20);
    } else {
        // Return an empty collection of plants when there's no search term.
        $plants = Plant::query()->where('id', '<', 0)->paginate(20);
    }

    return view('plant', compact('plants'));
})->name('plant.search_home');

Route::get('plant/{id}', function($id){
    $plant = Plant::whereId($id)->first();
    return view('plant-details',compact('plant'));
})->name('plant-search-details');

Route::get('disease', function () {
    $searchTerm = Request::get('searchTerm');


    if (!is_null($searchTerm) || !empty($searchTerm)) {
        $diseases = Disease::where('name', 'like', '%' . $searchTerm . '%')->paginate(20);
    } else {
        // Return an empty collection of plants when there's no search term.
        $diseases = Disease::query()->where('id', '<', 0)->paginate(20);
    }

    return view('disease', compact('diseases'));
})->name('disease.search_home');

Route::get('disease/{id}', function($id){
    $disease = Disease::whereId($id)->first();
    return view('disease-details',compact('disease'));
})->name('disease-search-details');

Route::resource('admin/disease',\App\Http\Controllers\Admin\DiseaseController::class);
Route::resource('admin/plant',\App\Http\Controllers\Admin\PlantController::class);

Route::resource('admin/post',\App\Http\Controllers\Admin\PostController::class);