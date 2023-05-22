<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $my_user = Auth::user();
        $user_skills = Skill::where('user_id', '=', $user->id)
        ->get();
        return view('skill_index')
        ->with('user', $user)
        ->with('my_user', $my_user)
        ->with('user_skills', $user_skills);
    }
    
    public function my_index()
    {
        $user = Auth::user();
        $user_skills = Skill::where('user_id', '=', $user->id)
        ->get();
        return view('my_skill_index')
        ->with('user', $user)
        ->with('user_skills', $user_skills);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = skill::all();
        return view('skill_create')
        ->with('skills',$skills);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'title'                    => 'required|max:100',
            'area'   => 'required|max:100',
            'summary' => 'required|max:1000',
        ]);
        $skill = new Skill;
        $skill -> title   = $request -> input(["title"]);
        $skill -> area    = $request -> input(["area"]);
        $skill -> summary = $request -> input(["summary"]);
        $skill -> user_id = Auth::user()->id;
        $skill -> save();
        return redirect()->route('skill.index')
        ->with('success','スキル作成完了');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('skill_edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate
        ([
            'title'                    => 'required|max:100',
            'area'   => 'required|max:100',
            'summary' => 'required|max:1000',
        ]);
        $skill -> title    = $request -> input(["title"]);
        $skill -> area     = $request -> input(["area"]);
        $skill -> summary  = $request -> input(["summary"]);
        $skill -> user_id  = Auth::user()->id;
        $skill -> save();
        return redirect()->route('skill.index')
        ->with('success','スキル更新完了');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        //
    }
}
