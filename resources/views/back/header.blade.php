
<header  style="z-index: 10000;">
<!-- ナビゲーション -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger bg-gradient fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                OtaNoEve</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- <li>
                    <a class="nav-link active" aria-current="page" onclick="Click_Sub()" style="cursor: pointer;">{{ __('カレンダーメモ') }}</a>
                </li> -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('アカウント') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    @if (Route::has('login'))
        
                        @auth
                            @if ( $user->role === 1 )
                                <li>
                                    <x-dropdown-link :href="route('user.index')">
                                    {{ __('ユーザー管理') }}
                                    </x-dropdown-link>
                                </li>
                            @else
                                <li>
                                    <x-dropdown-link :href="route('reservation.index')">
                                    {{ __('予約一覧') }}
                                    </x-dropdown-link>
                                </li>
                            @endif

                            <li>
                                <x-dropdown-link :href="route('profile.edit')">
                                {{ __('プロフィール') }}
                                </x-dropdown-link>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('ログアウト') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ログイン') }}</a></li>

                            @if (Route::has('register'))
                                <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('新規登録') }}</a></li>
                            @endif
                        @endauth
                    @endif

                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">{{ __('LINEでログイン') }}</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>

</header>

<div id="div1" style="display: none;">@include('back/calendar')</div>


<script>
function Click_Sub() {
	if (document.all.div1.style.display == "block") {
		document.all.div1.style.display = "none"
	} else {
		document.all.div1.style.display = "block"
	}
}
</script>
