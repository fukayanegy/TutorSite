@extends('footer')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="font-size:1.5rem;">家庭教師を依頼する</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('work.index')}}">戻る</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $work->name }}</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $work->summary }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>価格:</strong> {{ $work->price }}</li>
                        <li class="list-group-item"><strong>分野:</strong>
                        @foreach ($fields as $field)
                        @if($field->id==$work->field) {{ $field->name }} @endif
                        @endforeach
                        </li>
                        <li class="list-group-item"><strong>タイプ:</strong>
                        @foreach ($types as $type)
                        @if($type->id==$work->type) {{ $type->name }} @endif
                        @endforeach
                        </li>
                        <li class="list-group-item"><strong>地域:</strong> {{ $work->area }}</li>
                        <li class="list-group-item"><strong>必要なランク:</strong>
                        @foreach ($ranks as $rank)
                        @if($rank->id==$work->required_rank) {{ $rank->name }} @endif
                        @endforeach
                        </li>
                        <li class="list-group-item"><strong>募集期限:</strong> {{ $work->application_term }}</li>
                        <li class="list-group-item"><strong>注意事項:</strong> {{ $work->attention }}</li>
                    </ul>
                </div>
                <ul>
                    @foreach ($comments as $comment)
                    <li>
                    {{ $comment->comment }}
                    {{ $comment->user_id }}
                    </li>
                    @endforeach
                </ul>
                <div class="card-footer text-muted">
                    <strong>勤務期間:</strong> {{ $work->start_date }} 〜 {{ $work->end_date }}
                </div>
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">報酬・待遇</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $work->compensation }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <h4>勤務場所</h4>
            <p>{{ $work->address }}</p>
            <iframe id='map' src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAw3UEDVvo0ypAZ3cOs4vS0aWi3i9VR_dI&q={{ $work->address }}" width='100%' height='320' frameborder="0">
    </iframe>
        </div>
    </div>
</div>
@endsection
