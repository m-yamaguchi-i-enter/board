@if (Auth::check())
    {{-- ユーザー詳細ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('users.favorites', ['id' => Auth::user()->id]) }}">{{ Auth::user()->user_name }}&#39;s favorites</a></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    {{-- ユーザー登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">Signup</a></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">Login</a></li>
@endif