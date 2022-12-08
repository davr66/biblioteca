<?php

use App\Http\Controllers\AlunoController;
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
