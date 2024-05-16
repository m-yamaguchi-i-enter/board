<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $table = 'board';
    protected $primaryKey = 'message_id';
    
    protected $fillable = ['message'];
    
    /**
     * この投稿を所有するユーザー。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この投稿をお気に入りしているユーザー。（ Userモデルとの関係を定義）
     */
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'message_id', 'user_id')->withTimestamps();
    }
    
}
