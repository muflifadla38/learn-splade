<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Tables\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;

class UserController extends Controller
{
    protected $genders = ['male' => 'Male', 'female' => 'Female'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', ['users' => Users::class]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', ['genders' => $this->genders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|in:male,female',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Toast::title('Success')
            ->message('User created successfully!')
            ->autoDismiss();

        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user, 'genders' => $this->genders]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        Toast::title('Success')
            ->message('User updated successfully!')
            ->autoDismiss();

        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        Toast::title('Success')
            ->message('User deleted successfully!')
            ->autoDismiss();

        return to_route('users.index');
    }
}
