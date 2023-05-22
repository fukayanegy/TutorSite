<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Field;
use App\Models\Type;
use App\Models\Rank;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::all();
        $types = Type::all();
        $fields = Field::all();
        $users = User::all();
        if (isset(Auth::user()->name))
        {
            return view('work_index',compact('works'))
            ->with('types', $types)
            ->with('my_user', Auth::user())
            ->with('fields', $fields)
            ->with('users', $users);
        }
        else
        {
            return view('work_index',compact('works'))
            ->with('types', $types)
            ->with('fields', $fields)
            ->with('users', $users);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = Field::all();
        $types = Type::all();
        $ranks = Rank::all();
        return view('work_create')
        ->with('fields',$fields)
        ->with('types',$types)
        ->with('ranks',$ranks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'name'                      => 'required|max:100',
            'field'                     => 'required|integer',
            'type'                      => 'required|integer',
            'deadline_date'             => 'required|integer',
            'start_date'                => 'required|integer',
            'end_date'                  => 'required|integer',
            'required_rank'             => 'required|integer',
            'area'                      => 'required|max:20',
            'address'                   => 'required|max:100',
            'summary'                   => 'required|max:1000',
            'price'                     => 'required|integer',
            'compensation'              => 'required|max:1000',
            'application_term'          => 'required|max:1000',
            'attention'                 => 'required|max:1000',
        ]);
        $work = new Work;
        $work -> name = $request -> input(["name"]);
        $work -> field = $request -> input(["field"]);
        $work -> type = $request -> input(["type"]);
        $work -> summary = $request -> input(["summary"]);
        $work -> price = $request -> input(["price"]);
        $work -> compensation = $request -> input(["compensation"]);
        $work -> application_term = $request -> input(["application_term"]);
        $work -> attention = $request -> input(["attention"]);
        $work -> deadline_date = $request -> input(["deadline_date"]);
        $work -> start_date = $request -> input(["start_date"]);
        $work -> end_date = $request -> input(["end_date"]);
        $work -> area = $request -> input(["area"]);
        $work -> address = $request -> input(["address"]);
        $work -> required_rank = $request -> input(["required_rank"]);
        $work -> user_id = Auth::user()->id;
        $work -> suggestion = 0;
        $work -> save();
        return redirect()->route('work.index')
        ->with('success','依頼作成完了');
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        $fields = Field::all();
        $types = Type::all();
        $ranks = Rank::all();
        $comments = Comment::where('work_id', '=', $work->id)
        ->get();
        return view('work_show',compact('work'))
        ->with('fields',$fields)
        ->with('types',$types)
        ->with('comments', $comments)
        ->with('ranks',$ranks);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        $fields = Field::all();
        $types = Type::all();
        $ranks = Rank::all();
        return view('work_edit',compact('work'))
        ->with('fields',$fields)
        ->with('types',$types)
        ->with('ranks',$ranks);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
    {
        $request->validate
        ([
            'name'                      => 'required|max:100',
            'field'                     => 'required|integer',
            'type'                      => 'required|integer',
            'deadline_date'             => 'required',
            'start_date'                => 'required',
            'end_date'                  => 'required',
            'required_rank'             => 'required|integer',
            'area'                      => 'required|max:20',
            'address'                   => 'required|max:100',
            'summary'                   => 'required|max:1000',
            'price'                     => 'required|integer',
            'compensation'              => 'required|max:1000',
            'application_term'          => 'required|max:1000',
            'attention'                 => 'required|max:1000',
        ]);
        $work -> name = $request -> input(["name"]);
        $work -> field = $request -> input(["field"]);
        $work -> type = $request -> input(["type"]);
        $work -> summary = $request -> input(["summary"]);
        $work -> price = $request -> input(["price"]);
        $work -> compensation = $request -> input(["compensation"]);
        $work -> application_term = $request -> input(["application_term"]);
        $work -> attention = $request -> input(["attention"]);
        $work -> deadline_date = $request -> input(["deadline_date"]);
        $work -> start_date = $request -> input(["start_date"]);
        $work -> end_date = $request -> input(["end_date"]);
        $work -> area = $request -> input(["area"]);
        $work -> address = $request -> input(["address"]);
        $work -> required_rank = $request -> input(["required_rank"]);
        $work -> user_id = Auth::user()->id;
        $work -> suggestion = 0;
        $work -> save();
        return redirect()->route('work.index')
        ->with('success','依頼編集完了');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('work.index')
        ->with('success','依頼'.$work->name.'を削除しました');
    }
}
