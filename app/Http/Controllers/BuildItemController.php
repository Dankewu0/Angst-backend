<?php

namespace App\Http\Controllers;

use App\Models\BuildItem;
use App\Http\Services\BuildItemService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BuildItemController extends Controller
{
    public function __construct(protected BuildItemService $service) {}

    public function index(Request $request): JsonResponse
    {
        $limit = $request->input('limit', 10);

        return response()->json(
            $this->service->getItems($limit)
        );
    }

    public function store(Request $request): JsonResponse
    {
        $item = $this->service->createItem($request->all());

        return response()->json($item, 201);
    }

    public function update(Request $request, BuildItem $item): JsonResponse
    {
        $item = $this->service->updateItem($item, $request->all());

        return response()->json($item, 200);
    }

    public function destroy(BuildItem $item): JsonResponse
    {
        $this->service->deleteItem($item);

        return response()->json(null, 204);
    }
}
