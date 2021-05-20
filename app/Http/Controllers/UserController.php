<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();
        $spots = $user->spots->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'spots' => $spots,
        ]);
    }

    public function edit(string $name)
    {
        $user = User::where('name', $name)->first();
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(UserRequest $request , User $user)
    {
        $user->fill($request->all());
        $name = $user->name;
        $user = User::where('name', $name)->first();

        if(request('image_profile')){
            $filePath = $request->image_profile->store('users_images','public');
            $user->image_profile = str_replace('users_images/public/',time(), $filePath);
        }

        $user->introduction = $request->introduction;
        $user->email = $request->email;

        $spots = $user->spots->sortByDesc('created_at');

        $user->update();
        return view('users.show', [
            'user' => $user,
            'spots' => $spots,
        ]);
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();

        $spots = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'spots' => $spots,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();

        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();

        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}
