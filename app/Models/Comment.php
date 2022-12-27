<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function getByLimit(int $limit_count = 5)
    {
        return $this -> orderBy("updated_at", "DESC") -> limit($limit_count) -> get();
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with("category") -> orderBy("updated_at", "DESC") -> paginate($limit_count);
    }
    protected $fillable = [
    "user_id",
    "music_name",
    "music_id",
    'title',
    'body',
    "good",
    "category_id"
    ];
    
    public function category()
    {
        return $this -> belongsTo(Category::class);
    }
    
    public function goods()
    {
        return $this -> hasMany(Good::class, "comment_id");
    }
    public function is_good_by_auth_user()
    {
        $id = Auth::id();
        $gooders = array();
        foreach($this->goods as $good) {
            array_push($gooders, $good->user_id);
        }
        if (in_array($id, $gooders)) {
            return true;
        } else {
            return false;    
        }
    }
    // リプライ機能
    // コメントは複数のリプライ(返信)をもち、リプライは１つのコメントに従属
    public function replies()
    {
        return $this -> hasMany(Reply::class);
    }
    // コメントは1人の投稿者に従属
    public function user()
    {
        return $this -> belongsTo(User::class);
    }
    
}
