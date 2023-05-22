@extends('footer')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">家庭教師を依頼する</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('work.index')}}">戻る</a>
        </div>
    </div>
</div>

<div style="text-align:right;">
<form action="{{ route('work.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="依頼タイトル">
                @error('name')
                <span style="color:red;">依頼タイトルを入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="field" class="form-select">
                    <option>依頼したい分野を選択して下さい</otion>
                    @foreach ($fields as $field)
                        <option value="{{ $field->id }}">{{ $field->name }}</otion>
                    @endforeach
                </select>
                @error('field')
                <span style="color:red;">分野を選択してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="type" class="form-select">
                    <option>依頼するタイプを選択して下さい</otion>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</otion>
                    @endforeach
                </select>
                @error('type')
                <span style="color:red;">タイプを選択して下さい</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="required_rank" class="form-select">
                    <option>希望するチューターのランクを選択して下さい</otion>
                    @foreach ($ranks as $rank)
                        <option value="{{ $rank->id }}">{{ $rank->name }}</otion>
                    @endforeach
                </select>
                @error('required_rank')
                <span style="color:red;">ランクを選択して下さい</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <textarea class="form-control" style="height:100px" name="summary" placeholder="依頼概要"></textarea>
                @error('work_summary')
                <span style="color:red;">依頼概要を入力してください</span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="price" class="form-control" placeholder="目安予算(半角数字で入力して下さい)">
                @error('price')
                <span style="color:red;">目安予算を入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            <textarea class="form-control" style="height:100px" name="compensation" placeholder="報酬について"></textarea>
            @error('compensation_description')
            <span style="color:red;">報酬概要を入力してください</span>
            @enderror
        </div>
    </div>

    <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            <textarea class="form-control" style="height:100px" name="application_term" placeholder="応募条件"></textarea>
            @error('application_term')
            <span style="color:red;">応募条件を入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="area" class="form-control" placeholder="住んでいる地域(この情報は公開されます。個人を特定できない範囲で記入して下さい)">
                @error('area')
                <span style="color:red;">住んでいる地域を入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="address" class="form-control" placeholder="住所(この情報は非公開です)">
                @error('address')
                <span style="color:red;">住所を入力してください</span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="deadline_date" class="form-control" placeholder="依頼〆切日(半角数字、2022年1月1日なら『20220101』と入力)">
                @error('price')
                <span style="color:red;">依頼〆切日を入力して下さい</span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="start_date" class="form-control" placeholder="授業開始日(半角数字、2022年1月1日なら『20220101』と入力)">
                @error('price')
                <span style="color:red;">授業開始日を入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="end_date" class="form-control" placeholder="授業終了予定日(半角数字、2022年1月1日なら『20220101』と入力)">
                @error('price')
                <span style="color:red;">授業終了予定日を入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <textarea class="form-control" style="height:100px" name="attention" placeholder="その他・注意点"></textarea>
                @error('attention')
                <span style="color:red;">その他・注意点を入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
        </div>
    </div>
</form>
</div>
@endsection
