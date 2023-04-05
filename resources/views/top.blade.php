@extends('index')

@section('content')

    @include('back.indicator')
    
    @auth
        @if ( $user->role === 1 )
        <div class="section1 text-center" style="margin-top: 10%;">
            <button class="btn btn-pink-moon rounded-circle p-0" onclick="location.href='event/create'" role="button" style="width:10rem;height:10rem;font-size:20px;">+イベント追加</button>
        </div>
        @endif
    @endauth

    @if ( isset($reserve) )
        @include('back.popup')
    @endif
    

    <p class="mt-5 text-center text-warning-emphasis h1">Event</p></p>
    <div class="container container-m">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($events as $event)
            <div class="col">
                <div class="card h-100">

                    @auth
                        @if ( $user->role === 0 )
                            <form action="{{ route('reservation.create') }}" method="POST">
                            @csrf
                            @method('GET')
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="pt-4 text-center h5">
                                    <button class="btn_10">イベント予約</button>
                                </div>
                            </form>
                        @endif
                    @endauth

                    <img src="{{ asset($event->img_path) }}" class="mt-3 card-img-top border-3 border-dark rounded-circle" style="height: 30vh;">
                    <div class="card-body">
                        <h1 class="card-title text-center h4">{{ $event->name }}</h5>
                        
                        <dl class="card-text">
                            <dt class="px-4 px-md-2 h6">会場名</dt>
                            <dd class="px-5 px-md-3">{{ $event->hall_name }}</dd>
                            <dt class="px-4 px-md-2 h6">会場地</dt>
                            <dd class="px-5 px-md-3">{{ $event->place_name }} {{ $event->location_details }} </dd>
                            <dt class="px-4 px-md-2 h6">料金</dt>
                            <dd class="px-5 px-md-3">チケット代： {{ $event->price }} 円 </dd>
                            <dt class="px-4 px-md-2 h6">開催期間</dt>
                            <dt class="px-5 px-md-3">開始日</dt>
                            <dd class="px-5 px-md-3"> {{ $start_daze[$loop->index] }} </dd>
                            <dt class="px-5 px-md-3">終了日</dt>
                            <dd class="px-5 px-md-3"> {{ $end_daze[$loop->index] }} </dd>
                            <dt class="px-4 px-md-2 h6">詳細</dt>
                            <dd class="px-5 px-md-3">{{ $event->info }}</dd>
                        </dl>
                        
                    </div>

                    <a href=" /events/{{$event->id}}" class="text-center">イベント詳細</a>
                    
                    @auth
                        @if ( $user->role === 1 )
                            <a href=" /events/{{$event->id}}/edit " class="text-center" >編集</a>

                            <form action="/events/{{$event->id}}" method="POST" onSubmit="return check()">
                            @csrf
                                <input type="hidden" name="_method" value="delete">
                                <input type="submit" name="" id="dlt" value="削除" class="form-control">
                            </form>
                        @endif
                    @endauth

                    <div class="card-footer">
                        <small class="text-muted">Last updated {{ $event->updated_at }}</small>
                    </div>
                    
                </div>
            </div>
            
            
            @endforeach    
        </div>
    </div>
    <div class="mt-5">
        {{ $events->links("vendor.pagination.bootstrap-4") }} 
    </div>
    



<script>
    // 削除確認
    function check(){

        if(window.confirm('削除してよろしいですか？')){ // 確認ダイアログを表示

            return true; // 「OK」時は送信を実行
        }
        else{ // 「キャンセル」時の処理

            window.alert('キャンセルされました'); // 警告ダイアログを表示
            return false; // 送信を中止
        }
    }

</script>

@endsection
