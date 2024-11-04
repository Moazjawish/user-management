<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')->where('role','user')->latest()->get();
        $users = DB::table('users')->where('role','user')->paginate(5);
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
            // Validator::make(
                // data:[
                //     'first_name' => $request->first_name,
                //     'last_name' => $request->last_name,
                //     'email' => $request->email,
                //     'password' =>$request-> password,
                //     'password_confirmation' =>$request-> password_confirmation,
                //     'image' => $request->image,
                //     'position' => $request->position,
                //     'salary' => $request->salary,
                //     'role' => 'user',
                // ],
                // rules:[
                //     'first_name' => ['required','min:5'],
                //     'last_name' => ['required','min:5'],
                //     'email' => ['required','min:5', 'email'],
                //     'password' => ['required','min:5','confirmed'],
                //     'password_confirmation' => ['required','min:5'],
                //     'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                //     'position' => ['required','min:5'],
                //     'salary' => ['required','min:5'],
                // ])->validate();
                // if($validater->fails())
                // {
                //     dd('Invalid Data');
                // }


        $filename = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images',$filename,'public');

        User::create([
            'first_name' => $request->validated('first_name'),
            'last_name' => $request->validated('last_name'),
            'email' => $request->validated('email'),
            'password' =>$request-> validated('password'),
            'password_confirmation' =>$request-> validated('password_confirmation'),
            'image' => '/storage/'.$path,
            'position' => $request->validated('position'),
            'salary' => $request->validated('salary'),
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
    public function update(Request $request, User $user)
    {
            $request->validate([
            'first_name' => ['required','min:5'],
            'last_name' => ['required','min:5'],
            'email' => ['required','min:5', 'email'],
            'position' => ['required','min:5'],
            'salary' => ['required','min:5'],
        ]);
        if($request->hasFile('image'))
        {
            $hasfile = true;
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images',$filename,'public');
        }
        else
        {
            $hasfile = false;
        }
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $user->password ,
            'password_confirmation' => $user->password_confirmation,
            'image' => $hasfile == true ? '/storage/'.$path : $user->image ,
            'position' => $request->position,
            'salary' => $request->salary,
        ]);
        return redirect('/users/'.$user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
