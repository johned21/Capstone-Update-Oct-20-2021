<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $totalUsers = User::get()->count();
        $admins = User::where('role', 1)->get()->count();
        $adminsBarWidth = ($admins / $totalUsers) * 100;
        return view('pages.admins.index', compact('admins', 'adminsBarWidth'));
    }

    public function showUsers() {
        $users = User::orderByRaw('lastName,firstName')->get();
        return view('pages.admins.users', compact('users'));
    }

    public function storeUser(Request $request) {
        
        $request->validate([
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'middleName'            => 'required|string',
            'email'                 => 'required|email|unique:users',
            'username'              => 'required|string|unique:users',
            'contactNo'             => 'required|numeric|regex:/(09)[0-9]{9}/',
            'password'              => 'required|string|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|string|min:8',
        ]);

        $token = Str::random(24);

        $user = User::create([
            'firstName'         => $request->firstName,
            'lastName'          => $request->lastName,
            'middleName'        => $request->middleName,
            'email'             => $request->email,
            'contactNo'         => $request->contactNo,
            'username'          => $request->username,
            'password'          => bcrypt($request->password),
            'role'              => $request->role,
            'remember_token'    => $token,
        ]);

        return redirect()->route('admin.users')->with('Message', 'User has been successfully created.');
        
    }


    public function updateUser(Request $request) {

        
        $request->validate([
            'id'                    => 'required|numeric',
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'middleName'            => 'required|string',
            'email'                 => 'required|email|unique:users,email,'.$request->id,
            'username'              => 'required|string|unique:users,username,'.$request->id,
            'contactNo'             => 'required|numeric|regex:/(09)[0-9]{9}/',
            'role'                  => 'required|numeric',
        ]);
        $user = User::find($request->id);

        if(empty($request->get('password'))) $user->update($request->except('password'));
        else {
            $request->merge([
                'password' => bcrypt($request->password),
            ]);
            $user->update($request->all());
        }
        
    
        return redirect()->route('admin.users')->with('Message', "User [#ID$request->id] has been successfully updated.");
    }

    public function deleteUser(Request $request) {
        $user = User::find($request->id);
        $id = $request->id;
        $user->delete();

        return redirect()->route('admin.users')->with('Message', "User [#ID$id] has been successfully deleted.");
    }

    public function showStudents() {
        $students = Student::orderByRaw('lastName,firstName')->get();
        return view('pages.admins.students', compact('students'));
    }
}
