<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function addClient (Request $request) {
        $client = Client::create($request->all());

        return response()->json($client, 201);
    }


    public function getClients () {
        return response()->json(Client::all(), 200);
    }
}
