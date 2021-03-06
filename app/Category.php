<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'module', 'slug'];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }

    /* Tiene muchos Posts */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function tags() {
        return $this->hasMany(Tag::class);
    }
}
