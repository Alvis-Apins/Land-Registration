<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUnitRequest;
use App\Http\Resources\LandUnitResource;
use App\Models\LandUnit;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class LandUnitController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return LandUnitResource::collection(LandUnit::with('usage')->get());
    }

    public function store(LandUnitRequest $request): LandUnitResource
    {
        $landUnit = LandUnit::create($request->validated());
        return new LandUnitResource($landUnit);
    }

    public function show(LandUnit $landUnit): LandUnitResource
    {
        return new LandUnitResource($landUnit);
    }

    public function update(LandUnitRequest $request, LandUnit $landUnit): LandUnitResource
    {
        $landUnit->update($request->validated());
        return new LandUnitResource($landUnit);
    }

    public function destroy(LandUnit $landUnit): Response
    {
        $landUnit->delete();
        return response()->noContent();
    }
}
