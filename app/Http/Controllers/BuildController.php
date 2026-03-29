<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;
use App\Http\Services\BuildService;
class BuildController extends Controller
{
    public function __construct(protected BuildService $service) {}
    public function index(Request $request)
    {
        $builds = $this->service->getBuilds();
        return response()->json($builds);
    }

    public function store(Request $request)
    {
        $build = $this->service->createBuild($request->all());
        return response()->json($build, 201);
    }


    public function update(Request $request, Build $build)
    {
        $build = $this->service->updateBuild($build, $request->all());
        return response()->json($build, 200);
    }

    public function destroy(Build $build)
    {
        $this->service->deleteBuild($build);
        return response()->json(null, 204);
    }
}
