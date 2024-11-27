<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;

class LogoutController extends Controller
{
    public function handle(): \Illuminate\Http\JsonResponse
    {
        auth()->logout();

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
