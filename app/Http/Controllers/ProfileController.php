<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->get();
        return view('profile.index', compact('profiles'));
    }

    public function create()
    {
        return view ('profile.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min3',
            'address'=>'required|min3',
            'extra'=>'required|min3',
        ]);
        Profile::create([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'extra' => $request->get('extra'),
        ]);
        return redirect()->back()->with('message', 'Profile Berhasil di Buat');
    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|min3',
            'address'=>'required|min3',
            'extra'=>'required|min3',
        ]);
        $profile = Profile::find($id);
        $profile->name = $request->get('name');
        $profile->address = $request->get('address');
        $profile->extra = $request->get('extra');
        $profile->save();
        return redirect()->route('profile.index')->with('message', 'Profile Berhasil di Update');
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return redirect()->route('profile.index')->with('message', 'Profile Berhasil di Hapus');
    }
}