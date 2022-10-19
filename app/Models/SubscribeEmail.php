<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeEmail extends Model
{
    use HasFactory;

    protected $table = 'subscribe_emails';

    protected $fillable = [
        'email',
        'ip',
        'location',
    ];
}
