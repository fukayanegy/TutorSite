@extends('footer')
@section('content')
<a href="{{ route('mypage') }}"></a>
    <table>
        <thead>
            <tr>
                <th scope="col">資格種類</th>
                <th scope="col">資格名</th>
                <th scope="col">詳細情報</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_certifications as $user_certification)
            <tr>
                <td>
                    @foreach ($common_certifications as $common_certification)
                    @if($common_certification->id === $user_certification->genre) {{ $common_certification->name }} @endif
                    @endforeach
                </td>
                <td>{{ $user_certification -> title }}</td>
                <td>{{ $user_certification -> detail }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if ($user->id === $my_user->id)
    <div>
        <a href="{{ route('certification.create') }}">資格を追加する</a>
    </div>
    @endif
@endsection
