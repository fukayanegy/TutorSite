@extends('footer')

@section('content')
    <div class="work-list-container">
        <div class="page-title">
            <h2>依頼一覧</h2>
        </div>

        <div class="work-table">
            <table>
                <thead>
                    <tr>
                        <th>名前</th>
                        <th>価格</th>
                        <th>締め切り</th>
                        <th>ユーザー</th>
                        <th>分野</th>
                        <th>タイプ</th>
                        <th>地域</th>
                        @auth
                            <th>コメントする</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach ($works as $work)
                        <tr>
                            <td><a href="{{ route('work.show',$work->id) }}">{{ $work->name }}</a></td>
                            <td>{{ $work->price }}円</td>
                            <td>{{ $work->deadline_date }}</td>
                            <td>
                                <a href="{{ route('other_user.show',$work->user_id) }}">
                                    @foreach ($users as $user)
                                        @if($user->id === $work->user_id) {{ $user->name }} @endif
                                    @endforeach
                                </a>
                            </td>
                            <td>
                                @foreach ($fields as $field)
                                    @if($field->id === $work->field) {{ $field->name }} @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($types as $type)
                                    @if($type->id === $work->type) {{ $type->name }} @endif
                                @endforeach
                            </td>
                            <td>{{ $work->area }}</td>
                            @auth
                                <td><a href="{{ route('comment.create', $work->id) }}">コメント</a></td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<style>
    .work-list-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .page-title {
        margin-bottom: 20px;
    }

    .work-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .work-table th,
    .work-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .work-table th {
        background-color: #f5f5f5;
        font-weight: bold;
    }

    .work-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .work-table a {
    color: #337ab7;
    text-decoration: none;
    transition: color 0.3s;
}

    .work-table a:hover {
    color: #23527c;
}
</style>