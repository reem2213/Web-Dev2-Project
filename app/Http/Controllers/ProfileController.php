<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('Buyer/Profile')->with('user',$user);
    }

    
    
    public function update(Request $request)
    {
        $user = auth()->user();
        
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phoneNo' => 'nullable|string',
        ]);
        
        if ($request->hasFile('profile_photo_path')) {
            $filename = $request->file('image');
            $filename = time() . '-' . $request->file('profile_photo_path')->getClientOriginalName();
            $request->file('profile_photo_path')->move('assets/uploads/', $filename);
            $path_to_store = 'assets/uploads/' . $filename;
            $user->profile_photo_path = $path_to_store;
        }
        $user->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


    
}
