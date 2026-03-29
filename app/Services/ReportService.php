<?php

namespace App\Http\Services;

use App\Models\Report;
use Illuminate\Pagination\LengthAwarePaginator;

class ReportService
{
    public function getReports(int $perPage = 10): LengthAwarePaginator
    {
        $perPage = max(1, min($perPage, 10));
        return Report::query()
            ->latest()
            ->paginate($perPage);
    }
    public function createReport(array $data)
    {
        return Report::create($data);
    }
    public function deleteReport(Report $report)
    {
        $report->delete();
    }
}
