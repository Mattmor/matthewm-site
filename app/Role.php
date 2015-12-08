<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'level'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';
    protected $primaryKey = 'slug';

    /**
     * Sets the slug to the value of the title.
     */
    public function setSlugAttribute($value)
    {
        if ($value != "") {
            $this->attributes['slug'] = str_replace(" ", "_", strtolower($value));
        }
    }

    /**
     * A Role can have many Users.
     */
    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }
}
