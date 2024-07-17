<?php
use App\Http\Livewire\ProductsComponent;
use App\Http\Livewire\ProjectsComponent;
use App\Http\Livewire\PannellumComponent;
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
Route::get('products', ProductsComponent::class);
Route::get('projects', ProjectsComponent::class);
Route::get('/pannellum/{project_id}', PannellumComponent::class)->name('pannellum');
Route::get('/barcode-index', [ProductsComponent::class, 'barcodeIndex']);
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
