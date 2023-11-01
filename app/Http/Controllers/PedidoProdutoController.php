<?php

namespace App\Http\Controllers;


use App\Models\PedidoProduto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    public function produtos($pedido_id)
    {
        $getPorPedido = PedidoProduto::where("pedido_id", $pedido_id)->get();
        if(!$getPorPedido){
            return response()->jason(['message' => 'Nenhum produto encontrado para a categoria especificada'], 404);
        }else{
            return response()->json(['pedidos' => $getPorPedido], 200);
        }
    }

    public function store(Request $request)
    {
        $novoPedido = PedidoProduto::create($request->all());
        return $novoPedido;
    }

    public function show($id)
    {
        // Método para exibir os detalhes de um produto específico.
    }

    public function update(Request $request, $id)
    {
        // Método para atualizar um produto no banco de dados.
    }

    public function destroy($id)
    {
        // Método para excluir um produto do banco de dados.
    }
}
