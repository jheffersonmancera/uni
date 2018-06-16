<?php

namespace App\Models\Imagenes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class ImagenesUsuarios extends Model 
{
	
    protected $fillable = [
        'id', 'fk_own_user', 'fk_likes_dislikes', 'id_user_created', 'id_user_updated', 'src_imagen','like',
    ];
}
