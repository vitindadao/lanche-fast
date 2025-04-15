<?php

  //  use App\Livewire\Produto\ProdutoCreate;
  //  use App\Livewire\Produto\ProdutoEdit;
  //  use App\Livewire\Produto\ProdutoShow;
  //  use App\Livewire\Produto\ProdutoIndex;    

use App\Livewire\Cliente\ClienteCreate;
use App\Livewire\Cliente\ClienteEdit;
use App\Livewire\Cliente\ClienteIndex;
use App\Livewire\Cliente\ClienteShow;
use Illuminate\Support\Facades\Route;

Route::prefix('clientes')->group(function () {

    Route::get('/', ClienteIndex::class)->name('clientes.index');
    Route::get('/create', ClienteCreate::class)->name('clientes.create');
    Route::get('/{cliente}', ClienteShow::class)->name('clientes.show');
    Route::get('/{cliente}/edit', ClienteEdit::class)->name('clientes.edit');
});

// Route::prefix('produtos')->group(function () {
//     Route::get('/', ProdutoIndex::class)->name('produtos.index');
//     Route::get('/create', ProdutoCreate::class)->name('produtos.create');
//     Route::get('/{produto}', ProdutoShow::class)->name('produtos.show');
//     Route::get('/{produto}/edit', ProdutoEdit::class)->name('produtos.edit');
// });