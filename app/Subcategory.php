<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'category_id'];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
