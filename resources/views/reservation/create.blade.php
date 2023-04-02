@extends('index')

@section('content')

<div class="text-center mt-5 mx-5">
    <h1 class="h1 pt-4">予約確認</h1>
    

    <div class="card">
        <p class="mt-4">以下内容にお間違えがなければ<br>カード情報入力欄にお進みください</p>

        <form class="mt-4" action="/purchase" method="POST">
            @csrf
            @method('GET')
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <dl class="card-body datalist">
                    <dt class="h6 border-bottom w-50 mx-auto">予約者名</dt>
                    <dd> {{$user->name}} </dd>
                    <dt class="mt-2 h6 border-bottom w-50 mx-auto">予約イベント名</dt> 
                    <dd> {{$event->name}} </dd>
                    <dt class="mt-2 h6 border-bottom w-50 mx-auto">参加料</dt>
                    <dd> {{ $event->price }} 円</dd>
                
            </dl>

            <button class="my-2 btn_10">カード情報入力へ進む</button>
        </form>
    </div>
</div>



<p class="mt-5 text-center"><a href="{{ route('reservation.index')}}"> 予約リスト </a></p>

@endsection