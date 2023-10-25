<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //get de todos os produtos
    public function index()
    {
       $getAllProdutos = Produto::all();
       return $getAllProdutos;
    }
    
    public function getAcess($categoria)
    {
        $getCategoria = Produto::where("categoria", $categoria)->get();
        if($getCategoria->isEmpty()){
            return response()->jason(['message' => 'Nenhum produto encontrado para a categoria especificada'], 404);
        }else{
            return response()->json(['categoria' => $getCategoria], 200);
        }
    }

    //adicionar novo produto
    public function store(Request $request)
    {
        $produtos = new Produto;
        
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->preco = $request->preco;
        $produtos->categoria = $request->categoria;
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImg = $request->imagem;
            $extencao = $requestImg->extension();
            $imgNome = md5($requestImg->getClientOriginalName()) . "." . $extencao;
            $requestImg->move(public_path('img/produtos'), $imgNome);
            $produtos->imagem = $imgNome;
        }
        $produtos->save();

        return $produtos;
    }

    //get do produto pelo ID
    public function show(string $id)
    {
        $getIdProduto = Produto::find($id);
        return $getIdProduto;
    }

    //atualizar produto
    public function update(Request $request, string $id)
    {
       $atualizarProduto = Produto::find($id);
       if($atualizarProduto){
          $atualizarProduto->update($request->all($id));
          return $atualizarProduto;
       }else{
        return response()->json([
            'erro'=>'algo deu errado :c'
    ], 404);
       }
    }

    //exclui produto
    public function delet(string $id)
    {
        $deletProduto = Produto::destroy($id);
        if($deletProduto){
            return response()->json([
                  'Mensagem'=>'Produto excluido'
            ], 200);
        }
        return response()->json([
            'Erro'=>'Algo deu errado'
      ], 401);
    }

}
