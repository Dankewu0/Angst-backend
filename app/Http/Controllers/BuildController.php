<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;
use App\Http\Services\BuildService;
class BuildController extends Controller
{
    public function __construct(protected BuildService $service) {}
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Build $build)
    {
        //
    }

    public function edit(Build $build)
    {
        //
    }

    public function update(Request $request, Build $build)
    {
        //
    }

    public function destroy(Build $build)
    {
        //
    }
}
