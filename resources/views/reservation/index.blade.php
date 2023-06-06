

<!-- 管理者の予約リスト -->
<!-- <h1  style="margin-top: 56px"> 予約リスト</h1>
<p><a href="/dashboard">ホームに戻る</a></p>

<table>
    <tr>
        <th>id</th>
        <th>ユーザー名</th>
        <th>イベント名</th>
        <th>詳細</th>
        <th>予約キャンセル</th>
    </tr>
    @for($i=0; $i < count($reservations); $i++)
    <tr>
        <td>{{ $reservations[$i]->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $events[$i]->name }}</td>
        <th><a href=" /events/{{$reservations[$i]->event_id}}">予約詳細</a></th>
        <th>
            <form action="{{ route('reservation.destroy', $reservations[$i]->id)}}" method="POST" onSubmit="return check()">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="キャンセル">
            </form>
        </th>
    </tr>
    @endfor
</table> -->

@extends('index')

@section('content')


<div class="container container-m">
    <h1 class="my-5 pt-2 h1 text-center">予約済み</h1>
    @if (   $events == null)
        <h1 class="text-center h5">現在予約しているイベントはありません。</h1>
    @endif
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @for($i=0; $i < count($reservations); $i++)

        <div class="col container-m">
            <div class="card h-100">
                
                <img src="{{ asset($events[$i]->img_path) }}" class="card-img-top border border-white rounded-circle" alt="...">
                <div class="card-body">

                    <h5 class="card-title text-center h4">{{ $events[$i]->name }}</h5>
                    
                    <dl class="card-text">
                        <dt class="px-4 px-md-2 h6">会場名</dt>
                        <dd class="px-5 px-md-3"> {{ $events[$i]->hall_name }} </dd>
                        <dt class="px-4 px-md-2 h6">会場地</dt>
                        <dd class="px-5 px-md-3">{{ $events[$i]->place_name }} {{ $events[$i]->location_details }} </dd>
                        <dt class="px-4 px-md-2 h6">料金</dt>
                        <dd class="px-5 px-md-3">チケット代： {{ $events[$i]->price }} 円 </dd>
                        <dt class="px-4 px-md-2 h6">詳細</dt>
                        <dd class="px-5 px-md-3">{{ $events[$i]->info }}</dd>
                    </dl>
                </div>

                <a class="text-center" href=" /events/{{$reservations[$i]->event_id}}">予約詳細</a>

                <form action="{{ route('reservation.destroy', $reservations[$i]->id)}}" method="POST" onSubmit="return check()">
                @csrf
                @method('DELETE')
                    <input type="submit" name="" value="キャンセル" class="form-control">
                </form>

                <div class="card-footer">
                    <small class="text-muted">Last updated {{ $reservations[$i]->updated_at }}</small>
                </div>
            </div>
        </div>

    @endfor
    </div>
    <p class="container-m text-center"><a href="/">ホームに戻る</a></p>
</div>



<script>
    // 削除確認
    function check(){

        if(window.confirm('本当に予約をキャンセルしてもよろしいですか？')){ // 確認ダイアログを表示
            if(window.confirm('一度キャンセルしてしまうと空き状況により予約がとれなくなる可能性がありますが本当によろしいですか？')){ // 確認ダイアログを表示

                    return true; // 「OK」時は送信を実行
                    }
                    else{ // 「キャンセル」時の処理

                    window.alert('予約のキャンセルが中断されました'); // 警告ダイアログを表示
                    return false; // 送信を中止
                    exit;
                    }
        }
        else{ // 「キャンセル」時の処理

            window.alert('予約のキャンセルが中断されました'); // 警告ダイアログを表示
            return false; // 送信を中止
        }
    }

</script>

@endsection