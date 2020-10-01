<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $req)
    {
        $produtos = Produto::all();

        $mensagem = $req->session()->get('mensagem');

        return view('produtos.index', compact('produtos', 'mensagem'));
    }

    public function adicionar()
    {
        return view('produtos.adicionar');
    }

    public function Salvar(Request $req)
    {
        Produto::create($req->all());

        $req->session()->flash('mensagem', 'Produto adicionado com sucesso!');

        return redirect()->route('produto');
    }
}
