<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{

    
    public function show($id){
        // idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
        
    }
        /**
     * ユーザーのお気に入り一覧ページを表示するアクション。
     *
     * @param  $id  ユーザーのid
     * @return \Illuminate\Http\Response
     */
    public function favorites($id)
    {
        // idの値でユーザーを検索して取得
        $user = User::findOrFail($id);

        // ユーザーのお気に入り一覧を取得
        $favorites = $user->favorites()->paginate(10);
        
        // お気に入り一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'favorites' => $favorites,
        ]);
        
    }
}
