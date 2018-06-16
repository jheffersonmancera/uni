<?php

namespace App\Models\Likes;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'id', 'fk_user', 'like', 'dislike', 'id_user_created','fk_imagenes_usuarios',
        'id_user_updated',
    ];
}
