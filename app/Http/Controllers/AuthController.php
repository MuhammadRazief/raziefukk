<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('auth.index', compact('users'));
      
    }
    public function login()
    {
        //
        if(auth()->check()){
            return redirect()->route('dashboard.index');
        }else{
            return view('auth.login');
        }
    }

    public function actionlogin(Request $request){
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt($login)){
            return redirect()->route('dashboard.index')->with('success','Login Success');
        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login')->with('success','Logout Success');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        if($user){
            return redirect()->route('user.index')->with('success', 'User created successfully.');
        }else{
            return redirect()->route('user.index')->with('error', 'User failed to create.');
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::where('id',$id)->first();
        return view('auth.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

      
            return redirect()->route('user.index')->with('success', 'User updated successfully.');
      
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        if($user){
            $user->delete();
            return redirect()->route('user.index')->with('success', 'User deleted successfully.');
        }else{
            return redirect()->route('user.index')->with('error', 'User failed to delete.');
        }
    }
}
