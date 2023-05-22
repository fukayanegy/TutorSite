@extends('footer')

@section('content')
    <div>
        <div>
            <a href="{{ route('work.index')}}">戻る</a>
        </div>
    </div>

<div>
<form action="{{ route('comment.store', $work->id)}}" method="POST">
    @csrf
    <div>
        <textarea style="height:100px" name="comment" placeholder="コメント"></textarea>
        @error('comment')
        <span style="color:red;">入力してください</span>
        @enderror
    </div>
    <button type="submit">投稿</button>
</form>
</div>
@endsection
