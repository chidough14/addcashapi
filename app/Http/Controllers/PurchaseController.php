<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Stock;
use App\Models\Client;

class PurchaseController extends Controller
{
    public function addPurchase (Request $request) {
        $stock = Stock::find($request['stock_id']);

        $purchase = Purchase::create([
            'client_id' => $request['client_id'],
            'stock_id' => $request['stock_id'],
            'volume' => $request['volume'],
            'purchase_price' => $stock->unit_price
        ]);


        //update client table
        $client = Client::find($request['client_id']);
        $cash_balance = $client->investment - ($request['volume'] * $stock->unit_price);

        $client->investment = $cash_balance;
        $client->save();


        return response()->json($purchase, 201);

    }

    public function getPurchase ( $client_id) {

        $purchase = Purchase::where("client_id", $client_id)->get();


        foreach ($purchase as $p){
           $stock = Stock::find($p->stock_id);
    
           $p['client'] = $p->client;
           $p['current_price'] = $stock->unit_price;
           $p['company_name'] = $stock->name;

           $gain_loss = ($p->volume * $stock->unit_price ) - ($p->volume * $p->purchase_price);

           $p['gain_loss'] = $gain_loss;
    
        }


       return response()->json($purchase, 201);

    }
}
