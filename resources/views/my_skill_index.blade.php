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
                        <td>
                            <div>
                                <a href="{{ route('skill.edit', $user_skill->id) }}" style="font-family: Montserrat, sans-serif;">変更</a>
                                <form action="{{ route('skill.destroy',$user_skill->id) }}" method="POST" onsubmit='return confirm("削除しますか？");'>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">削除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{ route('skill.create') }}">スキルを追加する</a>
    </div>
@endsection
