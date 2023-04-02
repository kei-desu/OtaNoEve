@extends('index')
<?php
// dd($category);
?>
@section('content')



<div class="container" style="margin-top: 56px">
    <form enctype="multipart/form-data" action="{{ route('events.update',$event->id) }}" method="POST">
    @csrf
    @method('PUT')
        <h1 class="fw-bold mx-auto">イベント編集</h1>
        
        
        <div>
            <div>ファイル名：{{ $event->img_name }}</div>
            <img src="{{ asset($event->img_path) }}" class="" alt="...">

            <label for="img" class="form-label">写真の添付</label>
            <input class="form-control" id="img" name="image" type="file" accept="image/*" />
        </div>

        <div class="mb-3">
            <label for="name">イベント名</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="初期値" value="{{ $event->name}}">
        </div>
        <div class="mb-3">
            <label for="category">イベント種類</label>
            <select name='category_id' class="form-control" id="category">
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
                <input name="hall_name" type="text" class="form-control" id="hall_name" placeholder="会場名" value="{{ $event->hall_name}}">
                <select name='place_id' class="form-control" id="place">
                    @foreach($place as $p)
                        @if ($p->name ===  $event->place_name )
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
                <input name="location_details" type="text" class="form-control" id="place" placeholder="初期値" value="{{ $event->location_details}}">
            </div>
            <div class="mb-5 ms-3">
                <label for="price">料金</label>
                <input name="price" type="text" class="form-control" id="price" placeholder="初期値" value="{{ $event->price }}">
            </div>
            <h1>開催日時</h1>
            <div class="mb-5 ms-3">
                <div class="w-50">
                    <label for="datetime">予約可能日</label>
                    <div>現予約可能日時：{{ $event->datetime }}</div>
                    <input name="datetime" type="datetime-local" class="form-control" id="date_time">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="info">詳細</label>
            <textarea name="info" class="form-control" id="info" style="resize: none">{{ $event->info}}</textarea>
        </div>
        <div class="text-center">
            <button class="btn btn-secondary btnx-indigo-light">登録</button>
        </div>
        
    </form>
    <a href="/">トップに戻る</a>
</div

@endsection