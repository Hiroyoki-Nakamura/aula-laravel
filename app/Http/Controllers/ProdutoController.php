<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = 
        [
            (object)['vinho' => 'Gato Preto', 'uva' => 'Pinot Noir', 'tipo' => 'Tinto'],
            (object)['vinho' => 'Cassilero del Diablo', 'uva' => 'Malbec', 'tipo' => 'Rose']
        ];

        return view('produto.index', compact('produtos'));
    }

    public function criar(Request $req)
    {
        dd($req->all());
        return 'criar';
    }

    public function editar()
    {
        return "Editar";
    }
}
