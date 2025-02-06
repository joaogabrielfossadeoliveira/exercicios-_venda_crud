<?php

namespace App\Http\Controllers;

use App\Models\ItemVenda;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function store(Request $request)
    {
        $vendas = Venda::create([
            'cliente_id' => $request->cliente_id,
            'data_venda' => date('Y-m-d H:i:s'),
            'desconto' => $request->desconto,
            'subtotal' => 0,
            'total' => 0
        ]);
    $subtotal =0;
        foreach($request -> itens as $item){
            $subtotal += $item['quantidade']*$item['preco'];
        }

        $vendas = Venda::create([
            'cliente_id' => $request->cliente_id,
            'data_venda' => date('Y-m-d H:i:s'),
            'subtotal' => $subtotal,
            'desconto' => $request->desconto,
            'total' => 0
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Venda cadastrada com sucesso',
            'data' => $vendas                          
        ]);                                                  
    }

    public function index (){
        $venda = Venda::all();

        return response()->json([
            'status' => true,
            'message' => 'venda encontrado',
            'data' => $venda
        ]);

    }

    public function show ($id){
        $venda = Venda::find($id);

        if ($venda == null) {
            return response()->json([
                'status' => false,
                'message' => 'não encontrado',
               

            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'encontrado',
            'data'=> $venda
        ]);
    }

    public function update (Request $request){
        $venda = Venda::find($request->id);

        if ($venda == null) {
            return response()->json([
                'status' => false,
                'message' => "venda nao encontrado"
            ]);
        }

        if (isset($request->cliente_id)) {
            $venda->cliente_id = $request->cliente_id;
        }
        if (isset($request->data_venda)) {
            $venda->data_venda = $request->data_venda;
        }
        if (isset($request->subtotal)) {
            $venda->subtotal = $request->subtotal;
        }
        if (isset($request->desconto)) {
            $venda->desconto = $request->desconto;
        }
        if (isset($request->total)) {
            $venda->total = $request->total;
        }

        $venda->update();

        return response()->json([
            'status'=>true,
            'message'=>"cliente atualizado",
            'data'=>$venda
        ]);
    }

    public function delete($id)
    {
        $venda = Venda::find($id);

        if($venda == null){
            return response()->json([
            'status'=>false,
            'message'=>"venda nao encontrado"

            ]);
        }

        $venda->delete();

        return response()->json([
            'status'=>true,
            'message'=>"cliente deletado",
            'data'=>$venda
        ]);

    }

}
