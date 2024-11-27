<?php

namespace App\Policies;



use App\Domains\Users\Models\User;

class UserPolicy
{
    public function view(User $loggedInUser, User $viewingUser): bool
    {
        return true;
//        if ($loggedInUser instanceof Users) {
//            //TODO: Check if this is correct
//            return $business->businesses->contains($vehicle->business_id);
//        }
//
//        return $business->id === $vehicle->business_id;
    }
}
