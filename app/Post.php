<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 
        'slug', 
        'abstract', 
        'body', 
        'status',
        'user_id', 
        'category_id' 
    ];

    protected $dates = ['deleted_at'];

    /* Indica que se oculte la fecha de creación y fecha de actualización. */
    /* protected $hidden = ['created_at', 'updated_at']; */

    /* Relación con Imagenes de 1 a 1 */
    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    } 

    /* Pertenece a una Categoria */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /* Tiene muchos Comentarios */
    public function commests() {
        /* Sintaxis que se usa cuando estamos vinvulando un modelo con una tabla polimorfica. */
        return $this->morphMany(Commet::class, 'commentable')->whereNull('parent_id');
    }
}
