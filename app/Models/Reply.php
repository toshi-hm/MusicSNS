<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    // 割り当て許可
    protected $fillable = [
      "id",
      "user_id",
      "comment_id",
      "reply_body"
    ];
    
    // コメントは複数のリプライを持ち、リプライは1つのコメントに従属
    public function comment()
    {
        return $this -> belongsTo(Comment::class);
    }
    // リプライは1人の投稿者に従属
    public function user()
    {
        return $this -> belongsTo(User::class);
    }
    // リプライは複数の第二リプライを持ち、第二リプライは１つのリプライに従属
    public function second_replies()
    {
        return $this -> hasMany(Secondreply::class);
    }
}
