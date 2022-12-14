<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $table = 'favourites';

    protected $fillable = [
        'san_pham_id',
        'ten_san_pham',
        'so_luong',
        'don_gia',
        'is_cart',
        'is_favourite',
        'agent_id',
    ];
}
