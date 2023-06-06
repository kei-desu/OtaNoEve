<div class="text-center mt-3">
    <button id="modalOpen" class="btn btn-primary">カレンダーに保存</button>
</div>

<div id="easyModal" class="modal" style="display:block;">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="h4"> カレンダーに予約内容を保存しますか </h1>
            <span class="modalClose">×</span>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <form action="{{ route('calendar') }}" method="POST">
                @csrf
                    <div class="card h-100">
                        <div class='d-flex'>
                            <div class='w-50'>
                                <h1 class="card-title text-center h4">{{ $reserve->name }}</h5>
                                <img src="{{ asset($reserve->img_path) }}" class="mt-3 card-img-top border-3 border-dark" style="height: auto; width: 100%;">
                            </div>
                            
                            <div class="card-body w-50">
                                <dl class="card-text">
                                    <dt class="px-4 px-md-2 h6">会場名</dt>
                                    <dd class="px-5 px-md-3">{{ $reserve->hall_name }}</dd>
                                    <dt class="px-4 px-md-2 h6">会場地</dt>
                                    <dd class="px-5 px-md-3">{{ $reserve->place_name }} {{ $reserve->location_details }} </dd>
                                    <dt class="px-4 px-md-2 h6">料金</dt>
                                    <dd class="px-5 px-md-3">チケット代： {{ $reserve->price }} 円 </dd>
                                    <dt class="px-4 px-md-2 h6">開催期間</dt>
                                    <dt class="px-5 px-md-3">開始日</dt>
                                    <dd class="px-5 px-md-3"> {{ $reserve->start_time }} </dd>
                                    <dt class="px-5 px-md-3">終了日</dt>
                                    <dd class="px-5 px-md-3"> {{ $reserve->end_time }} </dd>
                                    <dt class="px-4 px-md-2 h6">詳細</dt>
                                    <dd class="px-5 px-md-3">{{ $reserve->info }}</dd>
                                    

                                    <input type="hidden" name="reserve_id" value="{{ $reserve_id }}">
                                    <input type="hidden" name="event_name" value="{{ $reserve->name }}">
                                    <input type="hidden" name="start_time" value="{{ $reserve->start_time }}">
                                    <input type="hidden" name="end_time" value="{{ $reserve->end_time }}">
                                    <input type="hidden" name="info" value="{{ $reserve->info }}">
                                </dl>
                            </div>
                        </div>
                        <a href=" /events/{{$reserve->id}}" class="text-center">予約内容詳細</a>
                        <div class="card-footer">
                            <small class="text-muted">Last updated {{ $reserve->updated_at }}</small>
                        </div>
                    </div>
                    <button class="btn btn-primary">保存する</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const buttonOpen = document.getElementById('modalOpen');
    const modal = document.getElementById('easyModal');
    const buttonClose = document.getElementsByClassName('modalClose')[0];

    // ボタンがクリックされた時
    buttonOpen.addEventListener('click', modalOpen);
    function modalOpen() {
        modal.style.display = 'block';
    }

    // バツ印がクリックされた時
    buttonClose.addEventListener('click', modalClose);
    function modalClose() {
        modal.style.display = 'none';
    }

    // モーダルコンテンツ以外がクリックされた時
    addEventListener('click', outsideClose);
    function outsideClose(e) {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>