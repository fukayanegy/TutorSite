@extends('footer')

@section('content')
<div class="container">
    <div class="profile-section">
        <h2>{{ $my_user->name }}</h2>
        <p>Email: {{ $my_user->email }}</p>
        <p><a href="{{ route('follow.index', $my_user->id)}}">フォロー</a></p>
        <p><a href="{{ route('follower.index', $my_user->id)}}">フォロアー</a></p>
        <p>Rank: 
            @foreach ($ranks as $rank)
                @if($rank->id==$my_user->user_rank) {{ $rank->rank_name }} @endif
            @endforeach
        </p>
        <hr>
        <div class="sub-section">
            <a href="{{ route('my_skill.index') }}">自分のスキルを見る</a>
        </div>
        <div class="sub-section">
            <a href="{{ route('my_certification.index') }}">自分の資格を見る</a>
        </div>
    </div>
</div>
@endsection
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .profile-section {
        margin-bottom: 30px;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    p {
        margin-bottom: 5px;
    }

    a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s;
    }

    a:hover {
        color: #0056b3;
    }

    hr {
        margin: 20px 0;
        border: 0;
        border-top: 1px solid #ccc;
    }

    .sub-section {
        margin-bottom: 10px;
    }
</style>
