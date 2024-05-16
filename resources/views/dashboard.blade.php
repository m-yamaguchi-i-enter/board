@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        @if (Auth::check())
            <div class="sm:col-span-2">
                {{-- 投稿フォーム --}}
                @include('boards.form')
            </div>
        @endif
        <div class="sm:col-span-2">
            {{-- 投稿一覧 --}}
            @include('boards.boards')
        </div>
    </div>
@endsection