<?php

namespace App\Http\Controllers\API\Branches;


use Illuminate\Routing\Controller;

class BranchIndexController extends Controller
{
    public function handle(): \Illuminate\Http\JsonResponse
    {

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
