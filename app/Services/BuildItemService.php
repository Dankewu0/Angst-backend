<?php

namespace App\Http\Services;

use App\Models\BuildItem;
use Illuminate\Support\Collection;

class BuildItemService
{
    public function getItems(int $limit = 10): Collection
    {
        $limit = max(1, min($limit, 100));

        return BuildItem::query()
            ->latest()
            ->take($limit)
            ->get();
    }

    public function createItem(array $data): BuildItem
    {
        return BuildItem::create($data);
    }

    public function updateItem(BuildItem $item, array $data): BuildItem
    {
        $item->update($data);
        return $item;
    }

    public function deleteItem(BuildItem $item): void
    {
        $item->delete();
    }
}
