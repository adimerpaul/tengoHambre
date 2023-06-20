<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesRequest;
use App\Models\Detail;
use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sales;
use Illuminate\Http\Request;

class SaleController extends Controller{
    public function index(Request $request){
        $dateInit = $request->get('dateIni');
        $dateEnd = $request->get('dateFin');
        $sales = Sale::whereBetween('date', [$dateInit, $dateEnd])
            ->with(['details','client','user'])
            ->orderBy('id','desc')->get();
        return $sales;
    }
    public function salesGasto(StoreSaleRequest $request){
        if ($request->concepto == ''){
            $numeroGasto = Sale::where('type','Egreso')->count();
            $request->concepto = 'Gasto '.($numeroGasto+1);
        }
        $sales = new Sale();
        $sales->date = date('Y-m-d');
        $sales->time = date('H:i:s');
        $sales->dateTime = date('Y-m-d H:i:s');
        $sales->total = $request->montoTotal;
        $sales->description = $request->concepto;
        $sales->type = 'Egreso';
        $sales->client_id = $request->client_id==0?null:$request->client_id;
        $sales->user_id = $request->user()->id;
        $sales->save();

        $detail = new Detail();
        $detail->sale_id = $sales->id;
        $detail->user_id = $request->user()->id;
        $detail->product_id = null;
        $detail->price = $request->montoTotal;
        $detail->quantity = 1;
        $detail->total = $request->montoTotal;
        $detail->productName = $request->concepto;

        $detail->save();

    }
    public function update(UpdateSaleRequest $request, $id){
        $sale = Sale::find($id);
        $sale->update($request->all());
        return $sale;
    }
}
