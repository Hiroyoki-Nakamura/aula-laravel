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

    public function salvar(Request $req)
    {
        Produto::create($req->all());

        $req->session()->flash('mensagem', 'Produto adicionado com sucesso!');

        return redirect()->route('produto');
    }

    public function editar($id)
    {
        $produto = Produto::find($id);
        return view('produtos.editar', compact('produto'));
    }

    public function atualizar(Request $req, $id)
    {
        $produto = $req->all();
        Produto::find($id)->update($produto);

        $req->session()->flash('mensagem', 'Produto atualizado com sucesso!');

        return redirect()->route('produto');
    }
}
