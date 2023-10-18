<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        // Lógica para exibir uma página
    }

    public function store(Request $request)
    {
        $produtos = new Produto;
        
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->preco = $request->preco;
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImg = $request->imagem;
            $extencao = $requestImg->extension();
            $imgNome = md5($requestImg->getClientOriginalName() . strtotime("now")) . "." . $extencao;
            $requestImg->storeAs('uploads', $imgNome, 'public');
            $produtos->imagem = $imgNome;
        }
        $produtos->save();

        return $produtos;
    }

}
