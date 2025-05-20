<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        return response()->json(Documento::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'responsavel' => 'required|string|max:255',
        ]);

        $documento = Documento::create($validated);
        return response()->json($documento, 201);
    }

    public function update(Request $request, Documento $documento)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'responsavel' => 'required|string|max:255',
        ]);

        $documento->update($validated);
        return response()->json($documento, 200);
    }
}