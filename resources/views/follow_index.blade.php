@extends('footer')

@section('content')
    <h2>Follow List</h2>
    <div>
        <table>
            <tbody>
                @foreach($follow_datas as $follow_data)
                    @foreach ($users as $user)
                        @if($user->id === $follow_data->user_id)
                            <tr>
                                <td>
                                    <h3>{{ $user->name }}</h3>
                                </td>
                                <td>
                                    @foreach($ranks as $rank)
                                    @if ($user->user_rank === $rank->id)
                                    <h4>{{ $rank->rank_name }}</h4>
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('other_user.show', $user->id) }}" class="btn btn-primary btn-sm">詳しく見る</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
