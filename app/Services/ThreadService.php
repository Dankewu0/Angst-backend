<?php

namespace App\Http\Services;

use App\Models\Thread;

class ThreadService
{
    public function getAllThreads()
    {
        return Thread::all();
    }

    public function getThread(Thread $thread)
    {
        return $thread;
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
