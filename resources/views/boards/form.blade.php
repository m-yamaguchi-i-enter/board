@if (Auth::check())
    <div class="mt-4">
        <!--BoardsControllerのstoreメソッドに投稿内容をPOST送信する-->
        <form method="POST" action="{{ route('board.store') }}">
            @csrf
            <div class="form-control mt-4">
                <p class="text-sm">投稿者名</p>
                <input type="hidden" class="mb-0" name="id" value="{{ Auth::user()->id }}">{{ Auth::user()->user_name }}</input>
            </div>
            <div class="form-control mt-4">
                <p class="text-sm">ひとことメッセージ</p>
                <textarea rows="2" name="message" class="input input-bordered w-full"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary normal-case">投稿する</button>
        </form>
    </div>
@endif
@if (session('complete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
        {{ session('complete') }}
        <button type="button" class="btn btn-square" id="close-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    </div>
@endif

<script>
    document.getElementById('close-button').addEventListener('click', function() {
        document.getElementById('alert').style.display = 'none';
    });
</script>

@if (session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="error">
        {{ session('error') }}
        <button type="button" class="btn btn-square" id="close-button2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    </div>
@endif

<script>
    document.getElementById('close-button2').addEventListener('click', function() {
        document.getElementById('error').style.display = 'none';
    });
</script>

