<?php

namespace App\Http\Services;

use App\Models\Media;
use Illuminate\Pagination\LengthAwarePaginator;

class MediaService
{
    public function getMedia(int $perPage = 10): LengthAwarePaginator
    {
         $perPage = max(1, min($perPage, 10));
        return Media::query()->latest()
        ->paginate($perPage);
    }
    public function createMedia(array $data): Media
    {
        return Media::create($data);
    }
    public function deleteMedia(Media $media): void
    {
        $media->delete();
    }
}
