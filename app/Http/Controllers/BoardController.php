<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use DB;

class BoardController extends Controller
{
    public function index(){

        $boards = DB::table('board')
                ->join('users', 'board.user_id', '=', 'users.id')
                ->select('board.*', 'users.user_name')
                ->orderBy('board.created_at', 'desc') 
                ->get();
        
        // dashboardビューでそれらを表示
        return view('dashboard', ['boards' => $boards]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'message' => 'required|max:280',
            'id' => 'required',
        ],
        [
            'message.required' => '※ひとことメッセージを入力してください。',
            'message.max' => '※140字以内で入力してください。'
        ]);
        
        try{
            $board = new Board;
            $board->user_id = $request->id;
            $board->message = $request->message;
            $board->save();
            
            return redirect('dashboard')->with('complete', '投稿しました！');
        }catch(\Exception $e) {
            return redirect('dashboard')->with('error', '投稿失敗しました');
        }
        
    }
    
    public function destroy(string $id)
    {
        // idの値で投稿を検索して取得
        $board = Board::findOrFail($id);
        
        // 認証済みユーザー（閲覧者）がその投稿の所有者である場合は投稿を削除
        if (\Auth::id() === $board->user_id) {
            $board->delete();
            return back()
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }

}
