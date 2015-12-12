<?php

namespace App;

use Markdown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'slug';
    protected $fillable = [
        'title',
        'body',
        'uploaded_image'
    ];

    public function getBodyAttribute($value)
    {
        return $value = Markdown::string($value);
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(" ", "-", strtolower($value));
    }
    public function setExcerptAttribute($value)
    {
        $this->attributes['excerpt'] = substr($value, 0, 160).'...';
    }
    /**
     * An article is owned by a user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
