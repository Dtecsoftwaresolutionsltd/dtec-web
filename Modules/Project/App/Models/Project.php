<?php

namespace Modules\Project\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class Project extends Model
{
    protected $fillable = [];

    protected $appends = ['title', 'description','short_description'];

    protected $hidden = ['front_translate'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function gallery()
    {
        return $this->hasMany(ProjectGallery::class, 'project_id');
    }

    public function translate()
    {
        return $this->belongsTo(ProjectTranslation::class, 'id', 'project_id')->where('lang_code', admin_lang());
    }

    public function front_translate()
    {
        return $this->belongsTo(ProjectTranslation::class, 'id', 'project_id')->where('lang_code', front_lang());
    }

    public function getTitleAttribute()
    {
        return $this->front_translate->title;
    }
    public function getDescriptionAttribute()
    {
        return $this->front_translate->description;
    }
    public function getShortDescriptionAttribute()
    {
        return $this->front_translate->short_description;
    }
    public function getAuthorCommentAttribute()
    {
        return $this->front_translate->author_comment;
    }
}
