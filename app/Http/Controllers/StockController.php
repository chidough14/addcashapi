<?php

namespace App\Http\Controllers;

use App\Models\Stock as ModelsStock;
use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller 
{
    public function getStocks () {
        return response()->json(Stock::all(), 200);
    }


    public function addStock (Request $request) {
        $stock = Stock::create($request->all());

        return response()->json($stock, 201);
    }

    public function editStock (Request $request, $id) {
        $stock = Stock::find($id);

        if(is_null($stock)) {
            return response()->json(['message'=> 'Stock not found'], 404);
        }

        $stock->update($request->all());

        return response($stock, 200);
    }

    public function deleteStock ($id) {
        $stock = Stock::find($id);

        if(is_null($stock)) {
            return response()->json(['message'=> 'Stock not found'], 404);
        }

        $stock->delete();

        return response(null, 204);

       
    }
}
