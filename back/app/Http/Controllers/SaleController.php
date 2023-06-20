<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesRequest;
use App\Models\Client;
use App\Models\Detail;
use App\Models\Product;
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
    public function store(StoreSaleRequest $request){

        $client=$this->insertUpdateClient($request);
        $sales = new Sale();
        $sales->client_id = $client->id;
        $sales->user_id = $request->user()->id;
        $sales->total = $request->montoTotal;
//        $sales->numeroFactura = 0;
        $sales->date = date('Y-m-d');
        $sales->time = date('H:i:s');
        $sales->datetime = date('Y-m-d H:i:s');
        $sales->type = 'Ingreso';

//        $sales->usuario = $request->user()->name;
//        $sales->venta = 'R';
//        $sales->tipoVenta = 'Ingreso';
//        $sales->metodoPago = $request->metodoPago;
//        $sales->aporte = $request->aporte;

        $sales->save();
        $concepto = "";
        foreach ($request->products as $product){
            $productSale= Product::find($product['id']);
//            $productSale->cantidad = $productSale->cantidad - $product['cantidadPedida'];
            $productSale->save();

            $detail = new Detail();
            $detail->sale_id = $sales->id;
            $detail->user_id = $request->user()->id;
            $detail->product_id = $product['id'];
            $detail->price = $product['precioVenta'];
            $detail->quantity = $product['cantidadPedida'];
            $detail->total = $product['subTotal'];
            $detail->productName = $product['name'];
            $detail->save();
            $concepto .= $product['cantidadPedida'].$product['name'].',';
        }
        $sales->description = substr($concepto,0,-1);
        $sales->save();

        return Sale::with(['details','client'])->find($sales->id);

    }
    public function insertUpdateClient(Request $request)
    {
        if (Client::where('nit', $request->client['nit'])->count()) {
            $client = Client::where('nit', $request->client['nit'])->first();
            $client->name = strtoupper($request->client['name']);
//            $client->codigoTipoDocumentoIdentidad = $request->client['codigoTipoDocumentoIdentidad'];
            $client->phone = $request->client['phone'];
            $client->save();
            return $client;
//            return "actualizado";
        } else {
            $client = new Client();
            $client->name = strtoupper($request->client['name']);
//            $client->codigoTipoDocumentoIdentidad = $request->client['codigoTipoDocumentoIdentidad'];
            $client->nit = $request->client['nit'];
//            $client->complemento = strtoupper($request->client['complemento']);
            $client->phone = $request->client['phone'];
            $client->save();
            return $client;
//            return "nuevo";
        }
    }
}
