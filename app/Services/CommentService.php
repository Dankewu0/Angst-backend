<?php

namespace App\Http\Services;

use App\Models\Comment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class CommentService
{
    protected string $centrifugoUrl;
    protected string $centrifugoKey;

    public function __construct()
    {
        $this->centrifugoUrl = config('services.centrifugo.url');
        $this->centrifugoKey = config('services.centrifugo.key');
    }

    public function getComments(int $perPage = 10): LengthAwarePaginator
    {
        $perPage = max(1, min($perPage, 100));
        return Comment::latest()->paginate($perPage);
    }

    public function createComment(array $data): Comment
    {
        $comment = Comment::create($data);
        $this->pushToCentrifugo($comment);
        return $comment;
    }

    public function updateComment(Comment $comment, array $data): Comment
    {
        $comment->update($data);
        $this->pushToCentrifugo($comment, 'update_comment');
        return $comment;
    }

    public function deleteComment(Comment $comment): void
    {
        $this->pushToCentrifugo($comment, 'delete_comment');
        $comment->delete();
    }

    protected function pushToCentrifugo(Comment $comment, string $event = 'new_comment'): void
    {
        $channel = 'thread_'.$comment->thread_id;
        $message = ['event' => $event, 'data' => $comment->toArray()];

        Http::withHeaders([
            'Authorization' => "apikey {$this->centrifugoKey}"
        ])->post("{$this->centrifugoUrl}/publish", [
            'channel' => $channel,
            'data' => $message,
        ]);
    }
}
