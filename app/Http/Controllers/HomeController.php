<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $users = User::all();
        return view('home',compact('users'));
    }
    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('edit', compact('user'));
}
public function update(Request $request, $id)
{
    // Validation logic here...
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);
    // Get the current user
    $user = Auth::user();

    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'districts' => $request->input['districts'],
        'gender' => $request->input['gender'],
        'regions' => $request->input['regions'],
        'date_birth' => $request->input['date_birth'],
        'phone' => $request->input['date_birth'],
        'password' => Hash::make($request->input['password']),
        // Update other fields as needed...
    ]);

    // Redirect or perform additional actions...

    return redirect('/')->with('success', 'User updated successfully!');
}
}
