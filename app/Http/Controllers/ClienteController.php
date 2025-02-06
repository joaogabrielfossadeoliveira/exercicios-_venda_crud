<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request){
        $cliente = Cliente::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cliente cadastrado',
            'data' => $cliente,
            
        ]);
    }

    public function index(){
        $clientes = Cliente::all();
        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function show($id){
        $cliente = Cliente::find($id);
        if($cliente == null){
            return response()->json([
                'status' => false,
                'message' => 'Cliente não encontrado'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
     }




     public function update(Request $request){
        $cliente = Cliente::find($request->id);
        if($cliente == null){
            return response()->json([
                'status' => false,
                'message' => 'Cliente não encontrado'
            ]);
        }
        if(isset($request->nome)){
            $cliente->nome = $request->nome;
        }

        if(isset($request->email)){
            $cliente->email = $request->email;
        }

        if(isset($request->telefone)){
            $cliente->telefone = $request->telefone;
        }

        if(isset($request->endereco)){
            $cliente->endereco = $request->endereco;
        }
        return response()->json([
            'status' => true,
            'data' => $cliente,
            'message' => 'Cliente atualizado'
        ]);
        $cliente->update();


}


public function delete($id){
    $cliente = Cliente::find($id);
    if($cliente == null){
        return response()->json([
            'status' => false,
            'message' => 'Cliente não encontrado'
        ]);
        
       
}
return response()->json([
    'status' => true,
    'data' => $cliente,
    'message' => 'Cliente deletado'
]);
$cliente->delete();

}
}