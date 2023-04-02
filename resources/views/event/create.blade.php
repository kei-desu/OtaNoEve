@extends('index')

@section('content')



<div class="container" style="margin-top: 56px">
    <form enctype="multipart/form-data" action="/events" method="POST">
    @csrf
        <h1 class="fw-bold mx-auto">イベント追加</h1>
        
        <div>
            <label for="img" class="form-label">写真の添付</label>
            <input class="form-control" id="img" name="image" type="file" accept="image/*" />
        </div>

        <div class="mb-3">
            <label for="name">イベント名</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="例：イベント祭">
        </div>
        <div class="mb-3">
            <label for="category">イベント種類</label>
            <select name='category_name' class="form-control" id="category">
                @foreach($category as $c)
                    <option>
                        {{ $c->name }}
                    </option>    
                @endforeach
            </select>
        </div>
        <div>
            <h1>概要</h1>
            <div class="mb-3 ms-3">
                <label for="place">場所</label>
                    <input name="hall_name" type="text" class="form-control" id="hall_name" placeholder="会場名">
                <select name='place_name' class="form-control" id="place">
                    @foreach($place as $p)
                        @if ($p->name === '東京都')
                            <option selected>
                                {{ $p->name }}
                            </option>
                        @else
                            <option>
                                {{ $p->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <input name="location_details" type="text" class="form-control" id="place" placeholder="住所">
            </div>
            <div class="mb-3 ms-3">
                <label for="price">料金</label>
                <input name="price" type="text" class="form-control" id="price" placeholder="数字のみ入力してください（※only yen）">
            </div>
            <h1>開催日時</h1>
            <div class="mb-5 ms-3">
                <div class="w-50">
                    <label for="datetime">予約可能日</label>
                    <input name="datetime" type="datetime-local" class="form-control" id="date_time">
                </div>
            </div>
            <!-- <div class="mb-5 ms-3">
                <div class="d-flex">
                    <div class="w-25">
                        <label for="start_date">開始日</label>
                        <input name="start_date" type="date" class="form-control" id="start_date">
                    </div>
                    <div class="w-25">
                        <label for="end_date">終了日</label>
                        <input name="end_date" type="date" class="form-control" id="end_date">
                    </div>
            </div>
            <div class="mb-5 ms-3">
                <div class="d-flex">
                    <div>
                        <label for="start_time">開始時間</label>
                        <input name="start_time" type="time" class="form-control" id="start_time">
                    </div>
                    <div>
                        <label for="end_time">終了時間</label>
                        <input name="end_time" type="time" class="form-control" id="end_time">
                    </div>
                </div>
            </div> -->
        </div>
        <div class="mb-3">
            <label for="info">詳細</label>
            <textarea name="info" class="form-control" id="info" style="resize: none"></textarea>
        </div>
        <div class="text-center">
            <button class="btn btn-primary">登録</button>
        </div>
        
    </form>
</div>

@endsection