<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function __construct(protected CommentService $service) {}

    public function index(Request $request): JsonResponse
    {
        $perPage = $request->input('perPage', 10);
        return response()->json($this->service->getComments($perPage));
    }

    public function store(Request $request): JsonResponse
    {
        $comment = $this->service->createComment($request->all());
        return response()->json($comment, 201);
    }

    public function update(Request $request, Comment $comment): JsonResponse
    {
        $comment = $this->service->updateComment($comment, $request->all());
        return response()->json($comment, 200);
    }

    public function destroy(Comment $comment): JsonResponse
    {
        $this->service->deleteComment($comment);
        return response()->json(null, 204);
    }
}
