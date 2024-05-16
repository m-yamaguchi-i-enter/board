<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
     /**
     * boardをお気に入りするアクション。
     *
     * @param  $id  お気に入りするboardのid
     * @return \Illuminate\Http\Response
     */
    public function store(string $id)
    {
        // 認証済みユーザー（閲覧者）が、 message_idをfavorite
        \Auth::user()->favorite(intval($id));
        // リダイレクトさせる(どこにか必須)
        return redirect('dashboard');
    }

    /**
     * boardのお気に入り解除するアクション。
     *
     * @param  $id  
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        // unfavoriteする
        \Auth::user()->unfavorite(intval($id));
        //リダイレクトさせる(どこにか必須)
        return redirect('dashboard');
    }
}
    