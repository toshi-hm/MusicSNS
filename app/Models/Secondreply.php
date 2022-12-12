<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Secondreply extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    //第二リプライは一人の投稿者に従属
    public function user()
    {
        return $this -> belongsTo(User::class);
    }
    // リプライは複数の第二リプライを持ち、第二リプライは一つのリプライに従属
    public function reply()
    {
        return $this -> belongsTo(Reply::class);
    }
}
