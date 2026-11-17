<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;

// Redirecionamento da rota inicial para a rota de equipamentos
Route::redirect('/', '/equipamentos');

// Etapa de Rotas: Importe o EquipamentoController e registre a rota resource 'equipamentos'
Route::resource('equipamentos', EquipamentoController::class);
