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
    
    // リプライ機能
    // 投稿者は複数のコメントをもつ
    public function comments2()
    {
        return $this -> hasMany(Comment::class);
    }
    //  投稿者は複数のリプライをもつ
    public function replies()
    {
        return $this -> hasMany(Reply::class);
    }
    // 投稿者は複数の第二リプライをもつ
    public function second_replies()
    {
        return $this -> hasMany(Secondreply::class);
    }
}
