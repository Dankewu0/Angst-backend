<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Services\ReportService;
class ReportController extends Controller
{
    public function __construct(protected ReportService $service) {}

    public function index()
    {
        return response()->json($this->service->getReports());
    }

    public function store(Request $request)
    {
        return response()->json($this->service->createReport($request->all()));
    }

    public function destroy(Report $report)
    {
        return response()->json($this->service->deleteReport($report));
    }
}
