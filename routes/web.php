<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SousCategoryController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class)->name('home');

Route::resource('/category', CategoryController::class);

Route::resource('/sub-category', SousCategoryController::class);


Route::get('/entreprise', [\App\Http\Controllers\EntrepriseController::class, 'index'])->name('entreprise');
Route::get('/entreprise-add', [\App\Http\Controllers\EntrepriseController::class, 'addEntreprise'])->name('entreprise.add');
Route::get('/entreprise-edit', [\App\Http\Controllers\EntrepriseController::class, 'updateEntreprise'])->name('entreprise.update');

Route::get('/service', [\App\Http\Controllers\ServiceController::class, 'index'])->name('service');
Route::get('/service-add', [\App\Http\Controllers\ServiceController::class, 'addservice'])->name('service.add');
Route::get('/service-edit', [\App\Http\Controllers\ServiceController::class, 'updateservice'])->name('service.update');

Route::get('/image', [\App\Http\Controllers\ServiceImageController::class, 'index'])->name('service-image');
Route::get('/image-add', [\App\Http\Controllers\ServiceImageController::class, 'addServiceImage'])->name('service-image.add');
Route::get('/image-edit', [\App\Http\Controllers\ServiceImageController::class, 'updateServiceImage'])->name('service-image.update');

Route::get('/horaire', [\App\Http\Controllers\HoraireController::class, 'index'])->name('horaire');
Route::get('/horaire-add', [\App\Http\Controllers\HoraireController::class, 'addHoraire'])->name('horaire.add');
Route::get('/horaire-edit', [\App\Http\Controllers\HoraireController::class, 'updateHoraire'])->name('horaire.update');

Route::get('/gallerie', [\App\Http\Controllers\GallerieController::class, 'index'])->name('gallerie');
Route::get('/gallerie-add', [\App\Http\Controllers\GallerieController::class, 'addgallerie'])->name('gallerie.add');
Route::get('/gallerie-edit', [\App\Http\Controllers\GallerieController::class, 'updategallerie'])->name('gallerie.update');

Route::get('/slider1', [\App\Http\Controllers\Slider1Controller::class, 'index'])->name('slider1');
Route::get('/slider1-add', [\App\Http\Controllers\Slider1Controller::class, 'addslider'])->name('slider1.add');
Route::get('/slider1-edit', [\App\Http\Controllers\Slider1Controller::class, 'updateslider'])->name('slider1.update');

Route::get('/slider2', [\App\Http\Controllers\Slider2Controller::class, 'index'])->name('slider2');
Route::get('/slider2-add', [\App\Http\Controllers\Slider2Controller::class, 'addslider'])->name('slider2.add');
Route::get('/slider2-edit', [\App\Http\Controllers\Slider2Controller::class, 'updateslider'])->name('slider2.update');

Route::get('/slider3', [\App\Http\Controllers\Slider3Controller::class, 'index'])->name('slider3');
Route::get('/slider3-add', [\App\Http\Controllers\Slider3Controller::class, 'addslider'])->name('slider3.add');
Route::get('/slider3-edit', [\App\Http\Controllers\Slider3Controller::class, 'updateslider'])->name('slider3.update');

Route::get('/sliderhaut', [\App\Http\Controllers\SliderLateralHautController::class, 'index'])->name('sliderhaut');
Route::get('/sliderhaut-add', [\App\Http\Controllers\SliderLateralHautController::class, 'addslider'])->name('sliderhaut.add');
Route::get('/sliderhaut-edit', [\App\Http\Controllers\SliderLateralHautController::class, 'updateslider'])->name('sliderhaut.update');

Route::get('/sliderbas', [\App\Http\Controllers\SliderLateralBasController::class, 'index'])->name('sliderbas');
Route::get('/sliderbas-add', [\App\Http\Controllers\SliderLateralBasController::class, 'addslider'])->name('sliderbas.add');
Route::get('/sliderbas-edit', [\App\Http\Controllers\SliderLateralBasController::class, 'updateslider'])->name('sliderbas.update');

Route::get('/sliderrecherche', [\App\Http\Controllers\SliderRechercheController::class, 'index'])->name('sliderrecherche');
Route::get('/sliderrecherche-add', [\App\Http\Controllers\SliderRechercheController::class, 'addslider'])->name('sliderrecherche.add');
Route::get('/sliderrecherche-edit', [\App\Http\Controllers\SliderRechercheController::class, 'updateslider'])->name('sliderrecherche.update');

Route::get('/sliderlh', [\App\Http\Controllers\SliderRechercheLHController::class, 'index'])->name('sliderlh');
Route::get('/sliderlh-add', [\App\Http\Controllers\SliderRechercheLHController::class, 'addslider'])->name('sliderlh.add');
Route::get('/sliderlh-edit', [\App\Http\Controllers\SliderRechercheLHController::class, 'updateslider'])->name('sliderlh.update');

Route::get('/sliderlb', [\App\Http\Controllers\SliderRechercheLBController::class, 'index'])->name('sliderlb');
Route::get('/sliderlb-add', [\App\Http\Controllers\SliderRechercheLBController::class, 'addslider'])->name('sliderlb.add');
Route::get('/sliderlb-edit', [\App\Http\Controllers\SliderRechercheLBController::class, 'updateslider'])->name('sliderlb.update');

Route::get('/mini-spot', [\App\Http\Controllers\MiniSpotController::class, 'index'])->name('minispot');
Route::get('/minispot-edit', [\App\Http\Controllers\MiniSpotController::class, 'update'])->name('minispot.update');

Route::get('/reportage', [\App\Http\Controllers\ReportageController::class, 'index'])->name('reportage');
Route::get('/reportage-edit', [\App\Http\Controllers\ReportageController::class, 'update'])->name('reportage.update');

Route::get('/pays', [\App\Http\Controllers\PaysController::class, 'index'])->name('pays');
Route::get('/pays-add', [\App\Http\Controllers\PaysController::class, 'addpays'])->name('pays.add');
Route::get('/pays-edit', [\App\Http\Controllers\PaysController::class, 'updatepays'])->name('pays.update');

Route::get('/ville', [\App\Http\Controllers\VilleController::class, 'index'])->name('ville');
Route::get('/ville-add', [\App\Http\Controllers\VilleController::class, 'addville'])->name('ville.add');
Route::get('/ville-edit', [\App\Http\Controllers\VilleController::class, 'updateville'])->name('ville.update');

Route::get('/parametre', [\App\Http\Controllers\ParametreController::class, 'index'])->name('parametre');
Route::get('/parametre-edit', [\App\Http\Controllers\ParametreController::class, 'updateparametre'])->name('parametre.update');

Route::resource('/admin', AdminController::class);


Route::get('/popup', [\App\Http\Controllers\PopupController::class, 'index'])->name('popup');
Route::get('/popup-edit', [\App\Http\Controllers\PopupController::class, 'updatepopup'])->name('popup.update');