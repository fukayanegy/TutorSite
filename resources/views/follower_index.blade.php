@extends('footer')

@section('content')
    <h2 class="card-title">Follower List</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <tbody>
                @foreach($follower_datas as $follower_data)
                    @foreach ($users as $user)
                        @if($user->id === $follower_data->follower_id)
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
