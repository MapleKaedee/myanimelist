<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePictureController extends Controller
{
    public function showUploadForm()
    {
        return view('home.coba');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'profile_picture_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_pictures', $imageName);

            // Pastikan 'profile_picture' ada dalam daftar fillable di model User
            $user->profile_picture = $imageName;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture has been uploaded.');
    }
}
