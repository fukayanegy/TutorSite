@extends('footer')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">スキルを追加する</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/tutors/mypage/skill') }}">戻る</a>
        </div>
    </div>
</div>

<div>
<form action="{{ route('skill.update', $skill->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div>
        <div>
            <div>
                <input type="text" name="title" value="{{ $skill->title }}" placeholder="スキルタイトル">
                @error('title')
                <span style="color:red;">依頼タイトルを入力してください</span>
                @enderror
            </div>
        </div>

        <div>
            <div>
                <textarea class="form-control" style="height:100px" name="area" placeholder="スキルに関する分野">{{ $skill->area }}</textarea>
                @error('area')
                <span style="color:red;">入力してください</span>
                @enderror
            </div>
        </div>
        <div>
            <div>
                <textarea class="form-control" style="height:100px" name="summary" placeholder="スキルの概要">{{ $skill->summary }}</textarea>
                @error('summary')
                <span style="color:red;">入力してください</span>
                @enderror
            </div>
        </div>

        <div>
                <button type="submit">登録</button>
        </div>
    </div>
</form>
</div>
@endsection
