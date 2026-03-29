<?php

namespace App\Http\Controllers;

use App\Http\Services\MediaService;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __construct(protected MediaService $service) {}
    public function index()
    {
        $media = $this->service->getMedia();
        return response()->json($media);
    }

    public function store(Request $request)
    {
        $media = $this->service->createMedia($request->all());
        return response()->json($media, 201);
    }
    public function destroy(Media $media)
    {
        $this->service->deleteMedia($media);
        return response()->json(null, 204);
    }
}
