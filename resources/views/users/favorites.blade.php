@extends('layouts.app')

@section('content')
<div class="mt-4">
    <ul class="list-none">
        @foreach ($favorites as $favorite)
            <li class="flex items-start gap-x-2 mb-4">
                <div>
                    <!--{{-- 投稿者名 投稿時間 --}}-->
                    <p class="mb-0">{{ $favorite->user->user_name }}</p>
                    <p class="mb-0">{{ $favorite->created_at }}</p>
                    <!--{{-- 投稿内容 --}}-->
                    <p class="mb-0">{!! nl2br(e($favorite->message)) !!}</p>
                </div>
                @include('components.favorite_button', ['id' => $favorite->message_id])
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $favorites->links() }}
</div>
<div class="text-left">
    <button class="btn btn-sm" onclick="location.href='{{ route('dashboard') }}'">戻る</button>
</div>
@endsection
