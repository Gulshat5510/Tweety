<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        if (
               auth()
            ->user()
            ->following($user)
        ) {
              auth()
            ->user()
            ->unfollow($user);
        } else {
              auth()
            ->user()
            ->follow($user);
        }
     

        return back();
    }
}
