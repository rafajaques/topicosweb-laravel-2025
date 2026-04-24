<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartasController extends Controller
{
    public function index()
    {
        $cartas = Carta::all();

        return view('cartas/index', [
            'cartas' => $cartas,
        ]);
    }

    public function inserir(Request $request)
    {
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

    public function editar(Request $request, Carta $carta)
    {
        if ($request->isMethod('PUT')) {
            $dados = $request->only('nome', 'tipo', 'numero');

            if ($request->hasFile('foto')) {
                // Excluir a foto antiga, se existir
                if ($carta->foto) {
                    Storage::disk('public')->delete($carta->foto);
                }

                $foto = $request->file('foto')->store('cartas', 'public');
                if ($foto) {
                    $dados['foto'] = $foto;
                }
            }

            $carta->fill($dados);
            $carta->save();

            return redirect()->route('cartas.index');
        }

        return view('cartas.editar', [
            'carta' => $carta,
        ]);
    }

    public function excluir(Request $request, Carta $carta)
    {
        // Excluir a carta do banco de dados
        if ($request->isMethod('DELETE')) {
            // Excluir a foto da carta, se existir
            if ($carta->foto) {
                Storage::disk('public')->delete($carta->foto);
            }
            $carta->delete();
            return redirect()->route('cartas.index');
        }

        return view('cartas.excluir', [
            'carta' => $carta,
        ]);
    }
}
