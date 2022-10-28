<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ClientResource::collection(
        Client::with('property')
            ->get()

        );
    }

    public function properties(int $id): Collection
    {
        $client = Client::find($id);
        return $client->property()->with('land')->get();
    }

    public function store(ClientRequest $request): ClientResource
    {
        $client = Client::create($request->validated());
        return new ClientResource($client);
    }

    public function show(Client $client): ClientResource
    {
        return new ClientResource($client);
    }

    public function update(ClientRequest $request, Client $client): ClientResource
    {
        $client->update($request->validated());
        return new ClientResource($client);
    }

    public function destroy(Client $client): Response
    {
        $client->delete();
        return response()->noContent();
    }
}
