<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commet extends Model
{
    protected $fillable = [
        'body',
        'status',
        'user_id',
        'post_id',
        'parent_id'
    ];
    
    /* Esta relación no es nesesaria ya que no nesecitamos saber 
    de un Post a partir de un Comentario, pero si saber de un Comentario
    a partir de un Post */

    /* Pertenece a un Post */
    /* public function post() {
        return $this->belongsTo(Post::class);
    } */

    /* Pertenece a un User */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /* Tiene muchas respuestas(Comentarios) */
    public function answers() {
        return $this->hasMany(Commet::class, 'parent_id');
    }
}
