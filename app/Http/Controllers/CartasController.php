<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;

class CartasController extends Controller
{
    public function index() {
        $cartas = Carta::all();

        return view('cartas/index', [
            'cartas' => $cartas,
        ]);
    }

    public function inserir(Request $request) {
        if ($request->isMethod('POST')) {
            $dados = $request->only('nome', 'tipo', 'numero');
            
            $foto = $request->file('foto')->store('cartas', 'public');
            
            if ($foto) {
                $dados['foto'] = $foto;
            }
            
            Carta::create($dados);

            return redirect()->route('cartas.index');
        }
        
        return view('cartas.inserir');
    }
}
