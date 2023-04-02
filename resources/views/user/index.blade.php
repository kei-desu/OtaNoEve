@extends('index')

@section('content')

<h1 class="fw-bold h1 text-center my-5 pt-5">ユーザー管理</h1>

<table class="m-auto border-2 border-dark">

    <tr class="border border-dark bg-danger text-center">
        <th class="border border-dark">id</th>
        <th class="border border-dark">ユーザー名</th>
        <th class="border border-dark">メールアドレス</th>
        <th class="border border-dark">権限</th>
        <th class="border border-dark">予約情報</th>
    </tr>

    @foreach ($users as $user)
    <tr class="border border-dark">
        <td class="border border-dark"> {{ $user->id }} </td>
        <td> {{ $user->name }} </td>
        <td class="border border-dark"> {{ $user->email }} </td>

        @if( $user->role == 1 )
            <td> 管理者 </td>
        @else
            <td> ユーザー </td>
        @endif

        <td class="border border-dark text-center">
            <form action="user/{{ $user->id }}" method="GET">
                <button class="btn btn-dark">{{ $user->name }}さんの予約詳細</button>
            </form>
        </td>
        
    </tr>
    @endforeach

</table>

<div class="my-5 text-center">
    <p><a href="/"> {{ __('トップに戻る') }} </a></p>
</div>

@endsection