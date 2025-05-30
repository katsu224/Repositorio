<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeriaController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\InstitucionalController;
use App\Http\Controllers\InvestigacionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\PublicacionesController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', HomeController::class)->name('homeP');

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/home', [PanelController::class, 'home'])->middleware(['auth', 'verified'])->name('home');

// Rutas protegidas por middleware de autenticación
Route::middleware('auth')->group(function () {
    // Perfil del usuario
    Route::get('/perfil', [PanelController::class, 'perfil']);
    Route::get('/manual', [PanelController::class, 'manual']);

    // Rutas de publicaciones
    Route::prefix('informes/publications')->group(function () {
        Route::get('/', [PublicacionesController::class, 'showPublications']);
    });
    Route::put('/informes/despublicar/{id}', [PublicacionesController::class, 'updateNoPublicado']);
    Route::put('/informes/publicar/{id}', [PublicacionesController::class, 'updatePublicado']);

    // Rutas de autores
    Route::prefix('autor')->group(function () {
        Route::get('/', [AutorController::class, 'showAutores']);
        Route::post('/', [AutorController::class, 'store']);
        Route::put('/{dni}', [AutorController::class, 'update']);
        Route::delete('/{dni}', [AutorController::class, 'destroy']);
        Route::get('/buscar', [AutorController::class, 'buscarAutores'])->name('autor.buscar');
    });

    // Rutas de informes
    Route::prefix('informes')->group(function () {
        Route::get('/', [InformeController::class, 'showInformes']);
        Route::get('/buscar-dni', [AutorController::class, 'buscarDNI']);
        Route::get('/add', [InformeController::class, 'add']);
        Route::post('/', [InformeController::class, 'store']);
        Route::put('/{id}', [InformeController::class, 'update']);
        Route::get('/{id}', [InformeController::class, 'showByIdInformes']);
        Route::delete('/{id}', [InformeController::class, 'destroy']);
    });
});

require __DIR__ . '/auth.php';

// Rutas para los repositorios
Route::prefix('institucional')->group(function () {
    Route::get('/', [InstitucionalController::class, 'index'])->name('institucional.index');
    Route::get('/{institucional}', [InstitucionalController::class, 'show'])->name('institucional.show');
});

// Rutas para el controlador Investigacion
Route::prefix('investigacion')->group(function () {
    Route::get('/', [InvestigacionController::class, 'index'])->name('investigacion.index');
    Route::get('/{investigacion}', [InvestigacionController::class, 'show'])->name('investigacion.show');
});

// Rutas para el controlador Modulo
Route::prefix('modulo')->group(function () {
    Route::get('/', [ModuloController::class, 'index'])->name('modulo.index');
    Route::get('/{modulo}', [ModuloController::class, 'show'])->name('modulo.show');
});

// Rutas para la feria
Route::prefix('feria')->group(function () {
    Route::get('/', [FeriaController::class, 'index'])->name('feria.index');
    Route::get('/{feria}', [FeriaController::class, 'show'])->name('feria.show');
});

// Rutas para filtros de fechas
Route::prefix('filtros/fecha')->group(function () {
    Route::get('/', [FilterController::class, 'searchYear'])->name('filtros.fechaP');
    Route::get('{id}', [FilterController::class, 'show'])->name('filtros.showFechaP');
    Route::get('fecharange/{range}', [FilterController::class,'searchYearRange'])->name('filtros.rangeYear');
});

// Rutas para filtros de autores
Route::prefix('filtros/autores')->group(function () {
    Route::get('/', [FilterController::class, 'autores'])->name('filtros.autores');
    Route::get('search', [FilterController::class, 'searchLetter'])->name('filtros.autores.search');
    Route::get('/informesAutor/{autor}', [FilterController::class, 'showInformes'])->name('filtros.showAutor');
    Route::get('/informes/{informe}', [FilterController::class, 'showInformeAutores'])->name('filtros.showInformeAutores');
    Route::get('/{autor}/informes', [FilterController::class, 'showInformes'])->name('filtros.informesA');
});

// Rutas para listas de títulos
Route::prefix('filtros/listTitle')->group(function () {
    Route::get('search', [FilterController::class, 'searchTitle'])->name('filtros.listTitle.search');
    Route::get('{filtros}', [FilterController::class, 'showtitle'])->name('filtros.show');
    Route::get('/', [FilterController::class, 'listTitle'])->name('filtros.listTitle');
});

// Rutas para categorías
Route::prefix('filtros/category')->group(function () {
    Route::get('/', [FilterController::class, 'categories'])->name('filtros.category');
    Route::get('/item/{id}', [CategoryController::class, 'show'])->name('carrera.show');
    Route::get('/{carrera?}', [CategoryController::class, 'carreras'])->name('carrera.index');
});

// Rutas para la practicas
Route::prefix('practicas')->group(function () {
    Route::get('/', [PracticaController::class, 'index'])->name('practicas.index');
    Route::get('/{practicas}', [PracticaController::class, 'show'])->name('practicas.show');
});
