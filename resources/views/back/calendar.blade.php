<div class="container drag-and-drop">
<a class="nav-link active" aria-current="page" onclick="Click_Sub()" style="cursor: pointer;">×</a>
    <div id="item">
        <div class="card">
            
                <div class="card-header text-center">
                            <span>{{ $calendar->getTitle() }}</span>
                </div>
            <form>
                <div class="card-body">
                    {!! $calendar->render() !!}
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // $(function(){
    // $.ajax({
    //     type: "get", //HTTP通信の種類
    //     url:'url('/?date=' . $calendar->getPreviousMonth())', //通信したいURL
    //     dataType: 'json'
    // })
    // //通信が成功したとき
    // .done((res)=>{
    //     console.log(res.message)
    // })
    // //通信が失敗したとき
    // .fail((error)=>{
    //     console.log(error.statusText)
    // })
    // });

    (function(){

        //要素の取得
        var elements = document.getElementsByClassName("drag-and-drop");

        //要素内のクリックされた位置を取得するグローバル（のような）変数
        var x;
        var y;

        //マウスが要素内で押されたとき、又はタッチされたとき発火
        for(var i = 0; i < elements.length; i++) {
            elements[i].addEventListener("mousedown", mdown, false);
            elements[i].addEventListener("touchstart", mdown, false);
        }

        //マウスが押された際の関数
        function mdown(e) {

            //クラス名に .drag を追加
            this.classList.add("drag");

            //タッチデイベントとマウスのイベントの差異を吸収
            if(e.type === "mousedown") {
                var event = e;
            } else {
                var event = e.changedTouches[0];
            }

            //要素内の相対座標を取得
            x = event.pageX - this.offsetLeft;
            y = event.pageY - this.offsetTop;

            //ムーブイベントにコールバック
            document.body.addEventListener("mousemove", mmove, false);
            document.body.addEventListener("touchmove", mmove, false);
        }

        //マウスカーソルが動いたときに発火
        function mmove(e) {

            //ドラッグしている要素を取得
            var drag = document.getElementsByClassName("drag")[0];

            //同様にマウスとタッチの差異を吸収
            if(e.type === "mousemove") {
                var event = e;
            } else {
                var event = e.changedTouches[0];
            }

            //フリックしたときに画面を動かさないようにデフォルト動作を抑制
            e.preventDefault();

            //マウスが動いた場所に要素を動かす
            drag.style.top = event.pageY - y + "px";
            drag.style.left = event.pageX - x + "px";

            //マウスボタンが離されたとき、またはカーソルが外れたとき発火
            drag.addEventListener("mouseup", mup, false);
            document.body.addEventListener("mouseleave", mup, false);
            drag.addEventListener("touchend", mup, false);
            document.body.addEventListener("touchleave", mup, false);

        }

        //マウスボタンが上がったら発火
        function mup(e) {
            var drag = document.getElementsByClassName("drag")[0];

            //ムーブベントハンドラの消去
            document.body.removeEventListener("mousemove", mmove, false);
            drag.removeEventListener("mouseup", mup, false);
            document.body.removeEventListener("touchmove", mmove, false);
            drag.removeEventListener("touchend", mup, false);

            //クラス名 .drag も消す
            drag.classList.remove("drag");
        }

    })()
</script>