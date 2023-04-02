@extends('index')

@section('content')

<h1 class="fw-bold h1 text-center mt-5 pt-5">イベント詳細</h1>
<div class="card mt-5 mx-5">
    
    <img src="{{ asset($event->img_path) }}" class="card-img-top">

    <div class="card-body">
        
        <dl class="card-text mb-5">
            <dt class="px-4 h6">イベント名</dt>
            <dd class="px-5"> {{ $event->name }} </dd>
            <dt class="px-4 h6">イベント種類</dt>
            <dd class="px-5"> {{ $event->category_name }} </dd>
            <dt class="px-4 h6">会場名</dt>
            <dd class="px-5">{{ $event->hall_name }} </dd>
            <dt class="px-4 h6">会場地</dt>
            <dd class="px-5">{{ $event->place_name }} {{ $event->location_details }} </dd>
            <dt class="px-4 h6">料金</dt>
            <dd class="px-5">チケット代： {{ $event->price }} 円 <br>(クレジットカード支払いのみ対応)</dd>
            <dt class="px-4 h6">詳細</dt>
            <dd class="px-5">{{ $event->info }}</dd>
        </dl>
    </div>


    @auth
        @if ( $user->role === 0 )
            <form class="mb-5" action="{{ route('reservation.create') }}" method="POST">
            @csrf
            @method('GET')
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <div class="text-center h5">
                    <input type="submit" value="チケット購入">
                </div>
            </form>
        @endif
    @endauth

</div>

<div class="my-5 text-center">
    <p><a href="/reservation"> {{ __('予約一覧') }} </a></p>
    <p><a href="/"> {{ __('トップに戻る') }} </a></p>
</div>

@endsection