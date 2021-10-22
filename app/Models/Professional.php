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
        'idCareer',
        'signature'
    ];
    protected $primaryKey = 'id';

    public function scopeSearch($query,$search){
        if($search)
            return $query->where('name','LIKE',"%$search%");
    }
}
