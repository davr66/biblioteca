<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EmprestimoController;
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

#ROTAS DE PÁGS GERAIS
Route::get('/',[PagesController::class,'index'])->name('inicio'); //PÁG INICIAL
Route::get('/sobre',[PagesController::class,'sobre'])->name('sobre');//SOBRE
Route::get('/assuntos',[PagesController::class,'cdds'])->name('CDD');//TABELA DE ASSUNTOS

#ROTAS DAS PÁGS DE ALUNO
Route::prefix('alunos')->group(function(){
    Route::get('/lista',[AlunoController::class,'index'])->name('alunos-index'); //TABELA
    Route::get('/cadastro',[AlunoController::class,'cadastro'])->name('alunos-cad');//FORM DE CADASTRO
    Route::post('/cadastro',[AlunoController::class,'store'])->name('alunos-cad.add');//INSERÇÃO DE DADOS DO CADASTRO
    Route::get('/{id}/edit',[AlunoController::class,'edit'])->/*where('id','[0,9]+')->*/name('alunos-edit');//EDITAR
    Route::put('/{id}', [AlunoController::class,'update'])->/*where('id','[0,9]+')->*/name('alunos-update');//ATUALIZAR DADOS DA EDIÇÃO
    Route::delete('/{id}', [AlunoController::class,'destroy'])->name('alunos-destroy');//DELETAR DADOS
});

#ROTAS DAS PÁGS DE AUTORES
Route::prefix('autor')->group(function(){
    Route::get('/lista',[AuthorController::class,'index'])->name('authors-index');//TABELA
    Route::get('/cadastro',[AuthorController::class,'cadastro'])->name('authors-cad');//FORM DE CADASTRO
    Route::post('/cadastro',[AuthorController::class,'store'])->name('authors-cad.add');//INSERÇÃO DE DADOS DO CADASTRO
    Route::get('/{id}/edit',[AuthorController::class,'edit'])->/*where('id','[0,9]+')->*/name('authors-edit');//EDITAR
    Route::put('/{id}', [AuthorController::class,'update'])->/*where('id','[0,9]+')->*/name('authors-update');//ATUALIZAR DADOS DA EDIÇÃO
    Route::delete('/{id}', [AuthorController::class,'destroy'])->name('authors-destroy');//DELETAR DADOS
});

#ROTAS DAS PÁGS DE EDITORAS
Route::prefix('editora')->group(function(){
    Route::get('/lista',[EditoraController::class,'index'])->name('editoras-index');//TABELA
    Route::get('/cadastro',[EditoraController::class,'cadastro'])->name('editoras-cad');//FORM DE CADASTRO
    Route::post('/cadastro',[EditoraController::class,'store'])->name('editoras-cad.add');//INSERÇÃO DE DADOS DO CADASTRO
    Route::get('/{id}/edit',[EditoraController::class,'edit'])->/*where('id','[0,9]+')->*/name('editoras-edit');//EDITAR
    Route::put('/{id}', [EditoraController::class,'update'])->/*where('id','[0,9]+')->*/name('editoras-update');//ATUALIZAR DADOS DA EDIÇÃO
    Route::delete('/{id}', [EditoraController::class,'destroy'])->name('editoras-destroy');//DELETAR DADOS
});

#ROTAS DAS PÁGS DE LIVROS
Route::prefix('livro')->group(function(){
    Route::get('/lista',[LivroController::class,'index'])->name('livros-index');//TABELA
    Route::get('/cadastro',[LivroController::class,'cadastro'])->name('livros-cad');//FORM DE CADASTRO
    Route::post('/cadastro',[LivroController::class,'store'])->name('livros-cad.add');//INSERÇÃO DE DADOS DO CADASTRO
    Route::get('/{id}/edit',[LivroController::class,'edit'])->/*where('id','[0,9]+')->*/name('livros-edit');//EDITAR
    Route::put('/{id}', [LivroController::class,'update'])->/*where('id','[0,9]+')->*/name('livros-update');//ATUALIZAR DADOS DA EDIÇÃO
    Route::delete('/{id}', [LivroController::class,'destroy'])->name('livros-destroy');//DELETAR DADOS
});

#ROTAS DAS PÁGS DE EMPRÉSTIMOS
Route::prefix('emprestimo')->group(function(){
    Route::get('/lista',[EmprestimoController::class,'index'])->name('emprestimos-index');//TABELA
    Route::get('/cadastro',[EmprestimoController::class,'cadastro'])->name('emprestimos-cad');//FORM DE CADASTRO
    Route::post('/cadastro',[EmprestimoController::class,'store'])->name('emprestimos-cad.add');//INSERÇÃO DE DADOS DO CADASTRO
    Route::get('/{id}/edit',[EmprestimoController::class,'edit'])->/*where('id','[0,9]+')->*/name('emprestimos-edit');//EDITAR
    Route::put('/{id}', [EmprestimoController::class,'update'])->/*where('id','[0,9]+')->*/name('emprestimos-update');//ATUALIZAR DADOS DA EDIÇÃO
    Route::delete('/{id}', [EmprestimoController::class,'destroy'])->name('emprestimos-destroy');//DELETAR DADOS
});
