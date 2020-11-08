<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\AccessoryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accessory;

class AccessoryApi extends Controller
{
    public function index()
    {
        return AccessoryResource::collection(Accessory::all());
    }

    public function show($id)
    {
        return new AccessoryResource(Accessory::findOrFail($id));
    }
}
