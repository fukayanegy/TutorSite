@extends('footer')

@section('content')
    <div>
        <h2>{{ $other_user->name }}</h2>
        <p>Email: {{ $other_user->email }}</p>
        <p>Rank: 
        @foreach ($ranks as $rank)
        @if($rank->id==$other_user->user_rank) {{ $rank->rank_name }} @endif
        @endforeach
        </p>
        <p>
            <a href="{{ route('follow.index', $other_user->id)}}">フォロー中</a>
        </p>
        <p>
            <a href="{{ route('follower.index', $other_user->id)}}">フォロアー</a>
        </p>
        <hr>
            <a href="{{ route('skill.index', $other_user) }}">スキルを確認する</a>
            <a href="{{ route('certification.index', $other_user) }}">資格を確認する</a>
        @auth
        <div>
            @if($other_user->id === $my_user->id)
            <div></div>
            @elseif(!$can_follow)
            <form method="POST" action="{{ route('other_user.follow', $other_user) }}">
                @csrf
                <button type="submit">フォロー中</button>
            </form>
            @else
            <form method="POST" action="{{ route('other_user.follow', $other_user) }}">
                @csrf
                <button type="submit">フォローする</button>
            </form>
            @endif
        </div>
        @endauth
    </div>
@endsection
