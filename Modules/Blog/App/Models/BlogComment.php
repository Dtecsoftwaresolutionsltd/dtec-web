<?php

namespace Modules\Blog\App\Models;

use Modules\Blog\App\Models\Blog;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{

    protected $fillable = [];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
