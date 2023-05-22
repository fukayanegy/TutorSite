@extends('footer')
@section('content')

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
                <td>
                    <div>
                        <a href="{{ route('certification.edit', $user_certification->id) }}" style="font-family: Montserrat, sans-serif;">変更</a>
                        <form action="{{ route('certification.destroy',$user_certification->id) }}" method="POST" onsubmit='return confirm("削除しますか？");'>
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

    <div>
        <a href="{{ route('certification.create') }}">資格を追加する</a>
    </div>
@endsection