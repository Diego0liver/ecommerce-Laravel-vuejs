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

   
    public function show($id)
    {
        $getIdPedido = Pedido::find($id);
        if($getIdPedido){
          
           $response = [
              'Pedido' => $getIdPedido,
              'Cliente'=> $getIdPedido->user
           ];
            return $getIdPedido;
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

    public function pedidoID($id)
    {
        $getID = Pedido::where('user_id', $id)->get();

        if($getID->isEmpty()){
           return response()->json('Pedido vazio', 404);
        }
        return response()->json($getID);
    }
}
