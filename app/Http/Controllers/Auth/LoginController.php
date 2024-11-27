<?php

namespace App\Http\Controllers\Auth;

use App\Domains\Users\Models\User;
use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function handle(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $token = Auth::guard()->attempt($credentials);

        if ($token) {
            return response()->json([
                'status' => 'success',
                'token_type' => 'bearer',
                'token' => $token,
                'expires_in' => Auth::guard()->factory()->getTTL() * 60,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => trans('auth.failed'),
        ], 401);
    }
}
