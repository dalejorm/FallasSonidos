<?php

namespace App\Policies;

use App\Models\User;


use Illuminate\Auth\Access\HandlesAuthorization;

class DashboardPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        error_log("Entro al policy viewany");
        if ($user->hasPermissionTo('show_dashboard')) {
            return true;
        }
        return false;
    }

    public function view(User $user)
    {
        error_log("Entro al policy de view");
        if ($user->hasPermissionTo('show_dashboard')) {
            error_log("retornara true el policy");
            return true;
        }
        return false;
    }

}