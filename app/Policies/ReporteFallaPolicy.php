<?php

namespace App\Policies;

use App\Models\ReporteFalla;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReporteFallaPolicy
{
    use HandlesAuthorization;

    
    public function author(User $user, ReporteFalla $reportfalla){
        if($user->id == $reportfalla->id_user){
            return true;
        } else {
            return false;
        }    
    }
}
