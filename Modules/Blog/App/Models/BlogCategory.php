<?php

namespace Modules\Blog\App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{

    protected $hidden = ['front_translate'];

    protected $fillable = [];

    protected $appends = ['name'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category_id', 'id');
    }

    public function translate(){
        return $this->belongsTo(BlogCategoryTranslation::class, 'id', 'blog_category_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(BlogCategoryTranslation::class, 'id', 'blog_category_id')->where('lang_code', front_lang());
    }

    public function getNameAttribute(){
        return $this->front_translate?->name;
    }


}
