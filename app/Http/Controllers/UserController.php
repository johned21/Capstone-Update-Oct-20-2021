<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('pages.users.index');
    }

    public function personalInfoForm() {
        return view('pages.users.users-personal-info');
    }

    public function personalInfoStore(Request $request) {
        // dd($request->profile_pic);
        $request->validate([
            'profile_pic'                 => 'mimes:jpeg,png,jpg',
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'middleName'            => 'required|string',
            'gender'                 => 'required|string',
            'birthDate'              => 'required|date',
            'birthPlace'             => 'required|string',
            'nationality'             => 'required|string',
            'religion'             => 'required|string',
            'civilStatus'           => 'required|string',
            'fatherName'             => 'required|string',
            'fatherOccup'             => 'required|string',
            'fatherContact'             => 'numeric',
            'motherName'             => 'required|string',
            'motherOccup'             => 'required|string',
            'motherContact'             => 'numeric',
            'guardianName'          => 'string',
            'guardianContact'       => 'numeric',
            'barangay'             => 'required|string',
            'town'             => 'required|string',
            'province'             => 'required|string',
            'grade_LVL'          => 'required|string',
            'elemSchool'             => 'required|string',
            'elemSchlAddr'             => 'required|string',
            'elemYrAttnd'             => 'required|string',
            'secondarySchool'             => 'string',
            'secondarySchlAddr'             => 'string',
            'secondaryYrAttnd'             => 'string',
        ]);

        $student = Student::create([
            'user_id'           => auth()->user()->id,
            'firstName'         => $request->firstName,
            'lastName'          => $request->lastName,
            'middleName'        => $request->middleName,
            'gender'        => $request->gender,
            'birthDate'        => $request->birthDate,
            'birthPlace'        => $request->birthPlace,
            'nationality'        => $request->nationality,
            'religion'        => $request->religion,
            'civilStatus'        => $request->civilStatus, 
            'fatherName'        => $request->fatherName,
            'fatherOccup'        => $request->fatherOccup,
            'fatherContact'        => $request->fatherContact,
            'motherName'        => $request->motherName,
            'motherOccup'        => $request->motherOccup,
            'motherContact'        => $request->motherContact,
            'guardianName'        => $request->guardianName,
            'guardianContact'        => $request->guardianContact,
            'barangay'        => $request->barangay,
            'town'        => $request->town,
            'province'        => $request->province,
            'grade_LVL'        => $request->grade_LVL,
            'elemSchool'        => $request->elemSchool,
            'elemSchlAddr'        => $request->elemSchlAddr,
            'elemYrAttnd'        => $request->elemYrAttnd,
            'secondarySchool'        => $request->secondarySchool,
            'secondarySchlAddr'        => $request->secondarySchlAddr,
            'secondaryYrAttnd'        => $request->secondaryYrAttnd,
        ]);

        $user = User::find(auth()->user()->id);
        $imageName = time().'.'.$request->profile_pic->extension(); 

        $user->profile_pic = $imageName;
        $user->save();

        $request->profile_pic->move(public_path('images'), $imageName);

        return redirect()->route('user.dashboard');
    }
}
