<div class="mt-4">
    @if (isset($boards))
        <ul class="list-none">
            @foreach ($boards as $board)
                <li class="flex items-start gap-x-2 mb-4 w-full bg-white p-4">
                    <div class="">
                        <!--{{-- 投稿者名 投稿時間 --}}-->
                        <nobr class="mb-0 font-semibold">{{ $board->user_name }}</nobr>&nbsp;&nbsp;&nbsp;&nbsp;<nobr>{{ $board->created_at }}</nobr>
                        <br>
                        <!--{{-- 投稿内容 --}}-->
                        <p class="mb-0">{!! nl2br(e($board->message)) !!}</p>
                    </div>
                    @if (Auth::check())
                        @include('components.favorite_button', ['id' => $board->message_id])
                    @endif
                    <div>
                        @if (Auth::id() == $board->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            <form method="POST" action="{{ route('board.destroy', $board->message_id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline btn-error btn-sm bg-transparent" 
                                    onclick="return confirm('Delete id = {{ $board->message_id }} ?')">Delete</button>
                            </form>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>