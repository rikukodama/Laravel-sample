
    <!-- wrapper_Start -->

    <!-- wrapper_End -->

    @extends('layout.app')
@section('content')
<div id="login">
    <form method="POST" action="{{ route('login') }}" name="UserLoginForm">
        @csrf
        <div class="login">
            <img src="{{ asset('img/login/tl_login.jpg') }}" alt="ログイン画面">
        </div>
        <div id="login_box">
            <div id="login_logo">
                <img src="{{ asset('img/login/i_logo_login.jpg') }}" alt="logo">
            </div>
            <div id="login_id">
                <img src="{{ asset('img/login/tm_id.gif') }}" alt="ID" class="mr10">
                <input type="text" name="LOGIN_ID" class="w320" value="">
            </div>
            <div id="login_pw">
                <img src="{{ asset('img/login/tm_pw.gif') }}" alt="パスワード" class="mr10">
                <input type="password" name="PASSWORD" class="w320">
            </div>
            <div id="login_btn">
                <button type="submit" name="submit" class="imgover">
                    <img src="{{ asset('img/login/bt_login.jpg') }}" alt="ログイン">
                </button>
                <a href="{{ route('password.reset') }}">パスワードお忘れの方</a>
            </div>
            @if (session('Message.flash'))
                <span class="must">{{ session('Message.flash') }}</span>
            @endif
        </div>
    </form>
</div>
@endsection
