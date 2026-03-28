<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Http\Services\ThreadService;
use App\Http\Requests\ThreadRequest;

class ThreadController extends Controller
{
    public function __construct(protected ThreadService $service) {}

    public function store(ThreadRequest $request)
    {
        $thread = $this->service->createThread($request->validated());
        return response()->json($thread, 201);
    }

    public function show(Thread $thread)
    {
        return response()->json($this->service->getThread($thread));
    }

    public function update(ThreadRequest $request, Thread $thread)
    {
        $thread = $this->service->updateThread($thread, $request->validated());
        return response()->json($thread);
    }

    public function destroy(Thread $thread)
    {
        $this->service->deleteThread($thread);
        return response()->noContent();
    }
}
