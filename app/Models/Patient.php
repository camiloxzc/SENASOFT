<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'document',
        'name'
    ];
    protected $primaryKey = 'id';

    public function scopeSearch($query,$search){
        if($search)
            return $query->where('document','LIKE',"%$search%")
            ->orWhere('name','LIKE',"%$search%");
    }
}
