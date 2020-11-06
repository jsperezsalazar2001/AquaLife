<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\FishResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fish;

class FishApi extends Controller
{
    public function index()
    {
        return FishResource::collection(Fish::all());
    }

    public function show($id)
    {
        return new FishResource(Fish::findOrFail($id));
    }
}
