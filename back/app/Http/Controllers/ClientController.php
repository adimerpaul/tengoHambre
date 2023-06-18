<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller{
    public function index(){ return Client::all(); }
    public function show(Client $client){ return $client; }
    public function store(StoreClientRequest $request){ return Client::create($request->all()); }
    public function update(UpdateClientRequest $request, Client $client){ return $client->update($request->all()); }
    public function destroy(Client $client){ return $client->delete(); }
}
