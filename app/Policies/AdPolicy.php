<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ad;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Ad $ad)
    {
        return $user->id === $ad->user_id;
    }
  
}
