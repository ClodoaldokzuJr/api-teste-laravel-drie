<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with('indices')->get();
        return response()->json($livros);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano' => 'required|integer|min:1500|max:' . date('Y'),
        ]);

        $livro = Livro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'ano' => $request->ano,
            'user_id' => $request->user()->id,
        ]);

        return response()->json($livro);
    }

    public function show($id)
    {
        $livro = Livro::with('indices')->findOrFail($id);
        return response()->json($livro);
    }

    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);

        if ($livro->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Ação não permitida.'], 403);
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano' => 'required|integer|min:1500|max:' . date('Y'),
        ]);

        $livro->update($request->only(['titulo', 'autor', 'ano']));

        return response()->json($livro);
    }

    public function destroy(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);

        if ($livro->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Ação não permitida.'], 403);
        }

        $livro->delete();

        return response()->json(['message' => 'Livro deletado com sucesso.']);
    }
}
