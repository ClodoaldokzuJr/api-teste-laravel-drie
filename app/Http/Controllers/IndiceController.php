<?php

namespace App\Http\Controllers;

use App\Models\Indice;
use Illuminate\Http\Request;

class IndiceController extends Controller
{
    public function store(Request $request, $livroId)
    {
        $livro = Livro::findOrFail($livroId);

        if ($livro->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Ação não permitida.'], 403);
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'pagina' => 'required|integer|min:1',
        ]);

        $indice = Indice::create([
            'titulo' => $request->titulo,
            'pagina' => $request->pagina,
            'livro_id' => $livro->id,
        ]);

        return response()->json($indice);
    }
}
