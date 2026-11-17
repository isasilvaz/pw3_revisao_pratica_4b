<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipamentos = Equipamento::orderBy('id', 'asc')->get();

        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|min:3|max:100',
            'categoria' => 'required',
            'localizacao' => 'required|min:3|max:100',
            'status' => 'required',
        ]);

        Equipamento::create($dadosValidados);

        return redirect()->route('equipamentos.index')->with('sucesso', 'Equipamento cadastrado com sucessso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipamento $equipamento)
    {
        return view('equipamentos.show', compact('equipamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipamento $equipamento)
    {
        return view('equipamentos.edit', compact('equipamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipamento $equipamento)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|min:3|max:100',
            'categoria' => 'required',
            'localizacao' => 'required|min:3|max:100',
            'status' => 'required',
        ]);

        $equipamento->update($dadosValidados);

        return redirect()->route('equipamentos.index')->with('sucesso', 'Equipamentos atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();

        return redirect()->route('equipamentos.index')->with('sucesso', 'Equipamento excluido com sucesso!');
    }
}
