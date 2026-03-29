<?php

namespace App\Http\Services;

use App\Models\Thread;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ThreadService
{
    public function getThread(int $perPage = 10): LengthAwarePaginator
    {
         $perPage = max(1, min($perPage, 10));
        return Thread::query()
            ->latest()
            ->paginate($perPage);
    }

    public function createThread(array $data)
    {
        return Thread::create($data);
    }

    public function updateThread(Thread $thread, array $data)
    {
        $thread->update($data);
        return $thread;
    }

    public function deleteThread(Thread $thread)
    {
        $thread->delete();
    }
}
