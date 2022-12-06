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
        'name',
        'email',
        'password',
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
    ];
    
    // いいね機能
    // コメントに対するリレーション
    public function comments()
    {
        // ユーザーは多数のコメントにいいねできる。
        return $this->belongsToMany(Comment::class);
    }
    // public function isLike($comment_id)
    // {
    //     return $this->comments()->where("comment_id", $comment_id)->exists();
    // }
    // // isLikeを使用して、すでにいいねをしたか確認した後、いいねする(重複回避)
    // public function like($comment_id)
    // {
    //     if($this->isLike($comment_id)) {
    //         // もしすでにいいねが押されていたら何もしない
    //     } else {
    //         // いいねが押されていなかったらいいねする
    //         $this->comments()->attach($comment_id);
    //     }
    // }
    // // isLikeを使用して、すでにいいねをしたか確認した後、いいねを取り消す
    // public function deleteLike($comment_id)
    // {
    //     if($this->isLike($comment_id)) {
    //         // もしすでにいいねしていたら取り消す
    //         $this->comments()->detach($comment_id);
    //     } else {
    //         //何もしない
    //     }
    // }
}
