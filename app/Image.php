<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    protected $fillable = ['url'];

    protected $dates = ['deleted_at'];
    protected $hidden = ['create_at', 'updated_at'];

    /* Relaciones Polimorficas */
    /* https://laravel.com/docs/7.x/eloquent-relationships#polymorphic-relationships */
    public function imageable(){
        return $this->morphTo();
    }
}
