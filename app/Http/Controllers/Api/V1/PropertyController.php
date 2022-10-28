<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PropertyController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return PropertyResource::collection(
            Property::with('land')->get()
        );
    }

    public function landUnits(int $id): Collection
    {
        $property = Property::find($id);
        return $property->land()->get();
    }

    public function store(PropertyRequest $request): PropertyResource
    {
        $property = Property::create($request->validated());
        return new PropertyResource($property);
    }

    public function show(Property $property): PropertyResource
    {
        return new PropertyResource($property);
    }

    public function update(PropertyRequest $request, Property $property): PropertyResource
    {
        $property->update($request->validated());
        return new PropertyResource($property);
    }

    public function destroy(Property $property): Response
    {
        $property->delete();
        return response()->noContent();
    }

}
