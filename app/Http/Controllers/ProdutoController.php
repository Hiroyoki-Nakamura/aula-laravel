<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function adicionar()
    {
        return view('produtos.adicionar');
    }

    public function Salvar(Request $req)
    {
        Produto::create($req->all());
        return redirect()->route('produto');
    }
}
