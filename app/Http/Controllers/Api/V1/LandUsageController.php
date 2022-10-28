<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsageRequest;
use App\Http\Resources\LandUsageResource;
use App\Models\LandUsage;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class LandUsageController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return LandUsageResource::collection(LandUsage::all());
    }

    public function store(LandUsageRequest $request): LandUsageResource
    {
        $landUsage = LandUsage::create($request->validated());
        return new LandUsageResource($landUsage);
    }

    public function show(LandUsage $landUsage): LandUsageResource
    {
        return new LandUsageResource($landUsage);
    }

    public function update(LandUsageRequest $request, LandUsage $landUsage): LandUsageResource
    {
        $landUsage->update($request->validated());
        return new LandUsageResource($landUsage);
    }

    public function destroy(LandUsage $landUsage): Response
    {
        $landUsage->delete();
        return response()->noContent();
    }
}
