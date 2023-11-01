<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
   
    public function store(Request $request)
    {
        $novoPedido = Pedido::create($request->all());
        return $novoPedido;
    }

   //pedido pelo ID do pedido
   public function show(string $id)
    {
        $getIdMesa = Pedido::find($id);
        if($getIdMesa){
           //pegando o testamento com os livros pela n:1
           $response = [
              'Pedido' => $getIdMesa,
              'Produtos'=> $getIdMesa->produt
           ];
            return $response;
          }
          return response()->json([
             'message' => 'Algo deu errado :('
            ], 404);
    }

  
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $deletaPedido = Pedido::destroy($id);
        return $deletaPedido;
    }

    //pedido pelo ID do usuario
    public function pedidoID($id)
    {
        $getID = Pedido::where('user_id', $id)->get();

        if($getID->isEmpty()){
           return response()->json('Pedido vazio', 404);
        }
        return response()->json($getID);
    }
}
