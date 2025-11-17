<?php

namespace Modules\Blog\App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected $hidden = ['front_translate'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = ['title', 'description', 'seo_title', 'seo_description', 'total_comment'];

    public function author(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id')->select('id', 'name','about_me', 'facebook', 'twitter', 'instagram', 'linkedin');
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }

    public function translate(){
        return $this->belongsTo(BlogTranslation::class, 'id', 'blog_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(BlogTranslation::class, 'id', 'blog_id')->where('lang_code', front_lang());
    }

    public function comments(){
        return $this->hasMany(BlogComment::class)->where('status', 1);
    }

    public function getTotalCommentAttribute(){
        return $this->comments->count();
    }

    public function getTitleAttribute(){
        return $this->front_translate?->title;
    }

    public function getDescriptionAttribute(){
        return $this->front_translate?->description;
    }

    public function getSeoTitleAttribute(){
        return $this->front_translate?->seo_title;
    }

    public function getSeoDescriptionAttribute(){
        return $this->front_translate?->seo_description;
    }
    public function getShortDescriptionAttribute(){
        return $this->front_translate?->short_description;
    }
}
