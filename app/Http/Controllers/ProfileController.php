<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth ::user();
      return view("user.profile", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'nullable|string|max:255',
            'last_name' =>  'nullable|string|max:255',
            'bio' => 'nullable|string|max:2500',
            'gender' => 'nullable|in:0,1',
            'age' => 'nullable|numeric|max:120|min:15',
            'avatar' => 'nullable|image'
        ]);
        $user = Auth ::user();
        $profile = $user->profile()->firstOrNew();
        if(!empty($request->avatar)){
            $tmpFile = $_FILES['avatar']['tmp_name'];
            $fileName = $_FILES['avatar']['name'];
            $fileName = explode('.', $fileName);
            $fileType = end($fileName);
            $fileName = time() .'.'. $fileType;
            $fullPath = "uploads/users/$fileName";
            move_uploaded_file($tmpFile, $fullPath);
            $profile->avatar = $fullPath;
        }
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->bio = $request->bio;
        $profile->gender = $request->gender;
        $profile->age = $request->age;
        //$user->profile->first_name = $request->first_name;
        $profile->save();
        return redirect()->back()->with('success','Profile has been saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
