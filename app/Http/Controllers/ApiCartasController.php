<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;

class ApiCartasController extends Controller
{
    public function index()
    {
        $cartas = Carta::select('id', 'nome', 'tipo')->orderBy('id', 'desc')->get();

        return response()->json($cartas);
    }

    public function show($carta)
    {
        $carta = Carta::find($carta);
        if (!$carta) {
            return response()->json(['message' => 'Carta não encontrada'], 404);
        }
        return response()->json($carta);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:255|in:Elétrico,Fogo,Água',
            'foto' => 'nullable|string',
        ]);

        $carta = Carta::create($dados);

        return response()->json($carta, 201);
    }
}
