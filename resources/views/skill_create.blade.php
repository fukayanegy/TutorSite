@extends('footer')

@section('content')
    <div>
        <div>
            スキル新規作成
        </div>
        <div>
            <a href="{{ url('/tutors/mypage/skill') }}">戻る</a>
        </div>
    </div>

<div>
<form action="{{ route('skill.store') }}" method="POST">
    @csrf
    <div>
        <div>
            <div>
                <input type="text" name="title" placeholder="スキルタイトル">
                @error('title')
                <span style="color:red;">依頼タイトルを入力してください</span>
                @enderror
            </div>
        </div>

        <div>
            <div>
                <textarea class="form-control" style="height:100px" name="area" placeholder="スキルに関する分野"></textarea>
                @error('area')
                <span style="color:red;">入力してください</span>
                @enderror
            </div>
        </div>
        <div>
            <div>
                <textarea class="form-control" style="height:100px" name="summary" placeholder="スキルの概要"></textarea>
                @error('summary')
                <span style="color:red;">入力してください</span>
                @enderror
            </div>
        </div>

        <div>
                <button type="submit" class="btn btn-primary w-100">登録</button>
        </div>
    </div>
</form>
</div>
@endsection