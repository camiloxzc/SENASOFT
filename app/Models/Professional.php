<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
        'career',
        'signature'
    ];
    protected $primaryKey = 'id';
}
