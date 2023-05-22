<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Certification;
use App\Models\CommonCertification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $my_user = Auth::user();
        $user_certifications = Certification::where('user_id', '=', $user->id)
        ->get();
        $common_certifications = CommonCertification::all();
        return view('certification_index')
        ->with('user', $user)
        ->with('my_user', $my_user)
        ->with('user_certifications', $user_certifications)
        ->with('common_certifications', $common_certifications);
    }
    
    public function my_index()
    {
        $user = Auth::user();
        $user_certifications = Certification::where('user_id', '=', $user->id)
        ->get();
        $common_certifications = CommonCertification::all();
        return view('my_certification_index')
        ->with('user', $user)
        ->with('user_certifications', $user_certifications)
        ->with('common_certifications', $common_certifications);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $common_certifications = CommonCertification::all();
        return view('certification_create')
        ->with('common_certifications', $common_certifications);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'genre'   => 'required|integer',
            'title'   => 'required|max:50',
            'detail' => 'required|max:1000',
        ]);
        $certification = new Certification;
        $certification -> genre    = $request -> input(["genre"]);
        $certification -> title      = $request -> input(["title"]);
        $certification -> detail    = $request -> input(["detail"]);
        $certification -> user_id = Auth::user()->id;
        $certification -> save();
        return redirect()->route('certification.index')
        ->with('success','依頼作成完了');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certification $certification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certification $certification)
    {
        $common_certifications = CommonCertification::all();
        return view('certification_edit',compact('certification'))
        ->with('common_certifications', $common_certifications);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certification $certification)
    {
        $request->validate
        ([
            'genre'   => 'required|integer',
            'title'   => 'required|max:50',
            'detail' => 'required|max:1000',
        ]);
        $certification -> genre    = $request -> input(["genre"]);
        $certification -> title      = $request -> input(["title"]);
        $certification -> detail    = $request -> input(["detail"]);
        $certification -> user_id = Auth::user()->id;
        $certification -> save();
        return redirect()->route('certification.index')
        ->with('success','依頼作成完了');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certification $certification)
    {
        $certification->delete();
        return redirect()->route('certification.index')
        ->with('success','依頼'.$certification->name.'を削除しました');
    }
}
