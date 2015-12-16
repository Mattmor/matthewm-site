<?php

namespace App;

use Markdown;
use Image;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'slug';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'uploaded_image'
    ];

    /**
     * When getting the body from database, convert the markdown to html.
     *
     * @return string
     */
    public function getBodyAttribute($value)
    {
        return $value = Markdown::string($value);
    }

    /**
     * Set slug to title and replace spaces with dashes.
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(" ", "-", strtolower($value));
    }

    /**
     * Set excerpt to first 160 characters of the body and add '...' after.
     */
    public function setExcerptAttribute($value)
    {
        $this->attributes['excerpt'] = substr($value, 0, 160).'...';
    }

    public function setUploadedImageAttribute($value)
    {
        if ($value) {
            $imagePath = public_path().'/images/uploaded/'.$value->getClientOriginalName();
            Image::make($value->getRealPath())->save($imagePath);
            $this->attributes['uploaded_image'] = '/images/uploaded/'.$value->getClientOriginalName();
        } else {
            $this->attributes['uploaded_image'] = '';
        }
    }

    /**
     * An article is owned by a user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
