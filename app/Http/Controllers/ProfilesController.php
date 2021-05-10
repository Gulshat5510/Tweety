<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->paginate(50),
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);
       
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => ['string', 'required', 'alpha_dash', 'max:255', Rule::unique('users')->ignore($user),],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user),],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
        ]);

        if (request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }   
  
        $user->update($attributes);
       
        return redirect($user->path());
    }
}
