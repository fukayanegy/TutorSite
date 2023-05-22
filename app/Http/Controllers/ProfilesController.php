<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_user = Auth::user();
        $profile = Profile::where('user_id', '=', $my_user->id)->first();
        if ($profile === NULL)
        {
            return view('profile_create');
        }
        return view('profile_index')
        ->with('my_user', $my_user)
        ->with('profile', $profile);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile_create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'catchphrase'        => 'required|max:50',
            'photo'              => 'required|max:50',
            'personal_name'      => 'required|max:50',
            'personal_gender'    => 'required|integer',
            'personal_birthyear' => 'required|integer',
            'personal_address'   => 'required|max:200',
            'phone_number'       => 'required|integer',
            'self_introduction'  => 'required|max:200',
        ]);
        $my_profile = new Profile;
        $my_profile -> catchphrase        = $request -> input(["catchphrase"]);
        $my_profile -> photo              = $request -> input(["photo"]);
        $my_profile -> personal_name      = $request -> input(["personal_name"]);
        $my_profile -> personal_gender    = $request -> input(["personal_gender"]);
        $my_profile -> personal_birthyear = $request -> input(["personal_birthyear"]);
        $my_profile -> personal_address   = $request -> input(["personal_address"]);
        $my_profile -> phone_number       = $request -> input(["phone_number"]);
        $my_profile -> self_introduction  = $request -> input(["self_introduction"]);
        $my_profile -> user_id            = Auth::user()->id;
        $my_profile -> save();
        return redirect()->route('profile.index')
        ->with('my_profile', $my_profile);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $my_user = Auth::user();
        $profile = Profile::where('user_id', '=', $my_user->id)->first();
        return view('profile_edit')
        ->with('my_user',$my_user)
        ->with('profile',$profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate
        ([
            'catchphrase'        => 'required|max:50',
            'photo'              => 'required|max:50',
            'personal_name'      => 'required|max:50',
            'personal_gender'    => 'required|integer',
            'personal_birthyear' => 'required|integer',
            'personal_address'   => 'required|max:200',
            'phone_number'       => 'required|integer',
            'self_introduction'  => 'required|max:200',
        ]);
        $my_profile = Profile::where('user_id', '=', Auth::user()->id)->first();
        $my_profile -> catchphrase        = $request -> input(["catchphrase"]);
        $my_profile -> photo              = $request -> input(["photo"]);
        $my_profile -> personal_name      = $request -> input(["personal_name"]);
        $my_profile -> personal_gender    = $request -> input(["personal_gender"]);
        $my_profile -> personal_birthyear = $request -> input(["personal_birthyear"]);
        $my_profile -> personal_address   = $request -> input(["personal_address"]);
        $my_profile -> phone_number       = $request -> input(["phone_number"]);
        $my_profile -> self_introduction  = $request -> input(["self_introduction"]);
        $my_profile -> user_id            = Auth::user()->id;
        $my_profile -> save();
        return redirect()->route('profile.index')
        ->with('my_profile', $my_profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
