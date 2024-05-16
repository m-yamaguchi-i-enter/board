<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'password',
        'user_id',
        'user_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    /**
     * このユーザーが所有する投稿。（boardモデルとの関係を定義）
     */
    public function boards()
    {
        return $this->hasMany(Board::class);
    }
    
    /**
     * このユーザーに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('message');
    }
    
    /**
     * このユーザーが所有するお気に入り投稿。（boardモデルとの関係を定義）
     */
    public function favorites()
    {
        return $this->belongsToMany(Board::class, 'favorites', 'user_id', 'message_id')->withTimestamps();
    }
    
    /**
     * $idで指定されたboardをお気に入りする。
     *
     * @param  int  $id
     * @return bool
     */
    public function favorite(int $id)
    {
        $exist = $this->is_favorites($id);
        $its_me = $this->message_id == $id;
        
        if ($exist || $its_me) {
            return false;
        } else {
            $this->favorites()->attach($id);
            return true;
        }
    }
    
    /**
     * $idで指定されたboardをお気に入り解除する。
     *
     * @param  int  $id
     * @return bool
     */
    public function unfavorite(int $id)
    {
        $exist = $this->is_favorites($id);
        $its_me = $this->message_id == $id;
        
        if ($exist && !$its_me) {
            $this->favorites()->detach($id);
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 指定された$idをお気に入り中であるか調べる。お気に入り中ならtrueを返す。
     * 
     * @param  int $id
     * @return bool
     */
    public function is_favorites(int $id)
    {
        return $this->favorites()->where('board.message_id', $id)->exists();
    }

    
}
