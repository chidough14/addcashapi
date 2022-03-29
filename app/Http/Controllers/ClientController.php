<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Stock;

class ClientController extends Controller
{
    public function addClient (Request $request) {
        $client = Client::create($request->all());

        return response()->json($client, 201);
    }


    public function getClients () {
        $sum = 0;

        $clients = Client::all();

        foreach ($clients as $client){
           

            foreach ($client->purchases as $p){
                $stock = Stock::find($p->stock_id);
     
                $gain_loss = ($p->volume * $stock->unit_price ) - ($p->volume * $p->purchase_price);

                $sum += $gain_loss;
         
            }

            $client['gain_loss'] = $sum;

            $sum = 0;
     
        }

         return response()->json($clients, 200);


    }
}
