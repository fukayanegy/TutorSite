@extends('footer')

@section('content')
        tuter_master
    <div>
        mypage
    </div>
    <div>
        <a href="{{ route('other_user.show',4) }}">ユーザーページに戻る</a>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Expertise</th>
                    <th>Teaching Areas</th>
                    <th>Teaching Experience Summary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_skills as $user_skill)
                    <tr>
                        <td>{{ $user_skill->title }}</td>
                        <td>{{ $user_skill->area }}</td>
                        <td>{{ $user_skill->summary }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
