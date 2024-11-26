<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('role','user')->latest()->cursorPaginate(3);
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image'))
        {
            $path = $request->file('image')->store('images','public');
        }
        else {
            $path = null;
        }

        User::create(
            [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'password' =>$validated['password'],
                'image' => $path, // Store the path of the uploaded image
                'position' => $validated['position'],
                'salary' => $validated['salary'],
                'role' => 'user',
            ]);
        return redirect('/users');
    }


    public function show(User $user)
    {
        return view('users.show', ['user' => $user , 'user_tasks' => $user->tasks]);
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        // if($request->hasFile('image'))
        // {
        //     if($user->image)
        //     {
        //         Storage::disk('public')->delete($user->image);
        //     }
        //     $path = $request->file('image')->store('images','public');
        // }
        // else
        // {
        //     $path = $user->image;
        // }
        $user->update([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'email' => $validated['email'],
                    // 'image' => $path,
                    'position' => $validated['position'],
                    'salary' => $validated['salary'],
        ]);
        return redirect('/users/'.$user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
