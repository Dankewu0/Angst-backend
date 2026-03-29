<?php

namespace App\Http\Services;

use App\Models\Build;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BuildService
{
    public function getBuilds(int $perPage = 10): LengthAwarePaginator
    {
         $perPage = max(1, min($perPage, 10));
        return Build::query()->latest()->paginate($perPage);
    }

    public function createBuild(array $data): Build
    {
        $build = Build::create($data);
        return $build;
    }

    public function updateBuild(Build $build, array $data): Build
    {
        $build->update($data);
        return $build;
    }

    public function deleteBuild(Build $build): void
    {
        $build->delete();
    }
}
