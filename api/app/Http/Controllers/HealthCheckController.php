<?php

namespace App\Http\Controllers;

// Base controller
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\JsonResponse;
use Throwable;

class HealthCheckController extends Controller
{
    public function apiCheck(): JsonResponse
        {
            return response()->json([
                'status' => 'ok',
                'app' => 'running',
            ], 200);
        }
}
