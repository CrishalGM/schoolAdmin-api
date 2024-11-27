<?php

namespace App\Http\Controllers\API\Users;

use App\Domains\Users\Models\User;
use App\Domains\Users\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersIndexController extends Controller
{
    public function __invoke()
    {
//        if (Auth::user() instanceof App) {
//            $business = Auth::user()->getBusiness();
//            return UserBusinessesResource::collection(collect([$business]));
//        }

        $businessIdsList = (Auth::user())->businessIds();
//        $businesses = Business::query()->select(['id','reference_code', 'name', 'email', 'dataset', 'parent_id', 'country_id', 'language_id'])->whereIn('id', $businessIdsList)->with(['apps','country:id,currency', 'language'])->get();
        $users = User::query()->get();

        return UserResource::collection($users);
    }
}
