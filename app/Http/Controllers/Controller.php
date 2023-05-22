<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Work;
use App\Models\Field;
use App\Models\Type;
use App\Models\Rank;
use App\Models\User;
use App\Models\Follow_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function client_home()
    {
        $my_user = Auth::user();
        $follow_datas = Follow_data::all();
        return view('client_home')
        ->with('follow_datas', $follow_datas)
        ->with('my_user', $my_user);
    }
    public function tutor_home()
    {
        $my_user = Auth::user();
        return view('tutor_home')
        ->with('my_user', $my_user);
    }
    public function mypage()
    {
        $my_user = Auth::user();
        $fields = Field::all();
        $follow_datas = Follow_data::all();
        $types = Type::all();
        $ranks = Rank::all();
        $users = User::all();
        return view('mypage')
        ->with('my_user', $my_user)
        ->with('follow_datas', $follow_datas)
        ->with('fields', $fields)
        ->with('types', $types)
        ->with('users', $users)
        ->with('ranks', $ranks);
    }
    public function other_userpage(User $other_user)
    {
        $follow_datas = Follow_data::all();
        $my_user = Auth::user();
        $can_follow = true;
        $ranks = Rank::all();
        if (isset(Auth::user()->name))
        {
            if ($other_user->id === $my_user->id)
            {
                $this->mypage();
            }
            foreach ($follow_datas as $follow_data)
            {
                if ($follow_data->user_id === $my_user->id && $follow_data->follower_id === $other_user->id)
                {
                    $can_follow = false;
                }
            }
            return view('userpage', compact('other_user'))
            ->with('my_user', $my_user)
            ->with('can_follow', $can_follow)
            ->with('ranks', $ranks);
        }
        else
        {
            return view('userpage', compact('other_user'))
            ->with('ranks', $ranks);
        }
    }
    public function user_follow(User $other_user)
    {
        $follow_datas = Follow_data::all();
        $my_user = Auth::user();
        $can_follow = true;
        foreach ($follow_datas as $follow_data)
        {
            if ($follow_data->user_id === $my_user->id && $follow_data->follower_id === $other_user->id)
            {
                $can_follow = false;
                $my_other_follow_data = Follow_data::where('follower_id', $other_user->id)->where('user_id', $my_user->id)->first();
            }
        }
        if(request()->method() === 'POST' && $can_follow)
        {
            $follow = new Follow_data;
            $follow->user_id = $my_user->id;
            $follow->follower_id = $other_user->id;
            $follow->save();
            return redirect()->route('other_user.show', $other_user)
            ->with('can_follow', $can_follow)
            ->with('success','フォローしました');
        }
        else if (!$can_follow)
        {
            $my_other_follow_data->delete();
            return redirect()->route('other_user.show', $other_user)
            ->with('can_follow', $can_follow)
            ->with('success' ,'既にフォローしています');
        }
        else
        {
            return '不正なリクエストです';
        }
    }
    public function follower_index(User $my_user)
    {
        $ranks = Rank::all();
        $follower_datas = Follow_data::where('user_id', $my_user->id)->get();
        $users = User::all();
        return view('follower_index')
        ->with('follower_datas', $follower_datas)
        ->with('users', $users)
        ->with('ranks',$ranks)
        ->with('my_user', $my_user);
    }
    public function follow_index(User $my_user)
    {
        $ranks = Rank::all();
        $follow_datas = Follow_data::where('follower_id', $my_user->id)->get();
        $users = User::all();
        return view('follow_index')
        ->with('follow_datas', $follow_datas)
        ->with('users', $users)
        ->with('ranks',$ranks)
        ->with('my_user', $my_user);
    }
}
