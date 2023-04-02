<script type="text/javascript">
    function draggable(target) {
        target.onmousedown = function() {
            document.onmousemove = mouseMove;
        };
        document.onmouseup = function() {
            document.onmousemove = null;
        };
        function mouseMove(e) {
            var event = e ? e : window.event;
            target.style.top = event.clientY + 'px';
            target.style.left = event.clientX + 'px';
        }
    }
</script>


<div class="container move" id="move">
<a class="nav-link active" aria-current="page" onclick="Click_Sub()" style="cursor: pointer;">×</a>
    <div class="row">
        <div class="col-md-8" id="item">
            <div class="card">

                <div class="card-header">{{ $calendar->getTitle() }}</div>
                <div class="card-body">
                    {!! $calendar->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    draggable(document.getElementById('move'));
</script>