<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Models\Aluno;

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

Route::get('/',[PagesController::class,'index'])->name('inicio');

Route::get('/assuntos',[PagesController::class,'cdds'])->name('CDD');

Route::prefix('alunos')->group(function(){
    Route::get('/lista',[AlunoController::class,'index'])->name('alunos-index');
    Route::get('/alunos/cadastro',[AlunoController::class,'cadastro'])->name('alunos-cad');
    Route::post('/alunos/cadastro',[AlunoController::class,'store'])->name('alunos-cad.add');
    Route::get('/{id}/edit',[AlunoController::class,'edit'])->/*where('id','[0,9]+')->*/name('alunos-edit');
    Route::put('/{id}', [AlunoController::class,'update'])->/*where('id','[0,9]+')->*/name('alunos-update');
    Route::delete('/{id}', [AlunoController::class,'destroy'])->name('alunos-destroy');
});

Route::prefix('profs')->group(function(){
    Route::get('/lista',[ProfController::class,'index'])->name('profs-index');
    Route::get('/profs/cadastro',[ProfController::class,'cadastro'])->name('profs-cad');
    Route::post('/profs/cadastro',[ProfController::class,'store'])->name('profs-cad.add');
    Route::get('/{id}/edit',[ProfController::class,'edit'])->/*where('id','[0,9]+')->*/name('profs-edit');
    Route::put('/{id}', [ProfController::class,'update'])->/*where('id','[0,9]+')->*/name('profs-update');
    Route::delete('/{id}', [ProfController::class,'destroy'])->name('profs-destroy');
});

Route::prefix('author')->group(function(){
    Route::get('/lista',[AuthorController::class,'index'])->name('author-index');
    Route::get('/author/cadastro',[AuthorController::class,'cadastro'])->name('author-cad');
    Route::post('/author/cadastro',[AuthorController::class,'store'])->name('author-cad.add');
    Route::get('/{id}/edit',[AuthorController::class,'edit'])->/*where('id','[0,9]+')->*/name('author-edit');
    Route::put('/{id}', [AuthorController::class,'update'])->/*where('id','[0,9]+')->*/name('author-update');
    Route::delete('/{id}', [AuthorController::class,'destroy'])->name('author-destroy');
});
