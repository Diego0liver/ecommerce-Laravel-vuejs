<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pedido;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function registroAdm(Request $req, User $user)
    {
        $userAdm = $req->only('name', 'email', 'password', 'rua', 'cidade', 'estado', 'telefone');
        $userAdm['password'] = bcrypt($userAdm['password']);
        if(!$user = $user->create($userAdm))
        abort(500, 'Error 404');
       else{
        return
           Pedido::create($req->all()) &&
           $user &&
           Pedido::where('id', $user->id)->update(['user_id' => $user->id]);
        };
    }

     public function loginAdmin(Request $req)
    {
        $credencial = $req->only('email', 'password', 'id');
        if(!auth()->attempt($credencial))abort(401, 'nao autorizado');
        $token = auth()->user()->createToken('ecommerceAdm_token');
        $id = auth()->user()->id;
        return response()->json([
            'token' => $token->plainTextToken,
             'id'=>$id
        ]);
    }

    public function cliente(string $id)
    {
        $getIdCliente = User::find($id);
        return $getIdCliente;
    }
}
