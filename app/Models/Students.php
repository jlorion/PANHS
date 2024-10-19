<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    

    public $timestamps = false;

    protected $fillable  = [
        'id', 
        'first_name',
        'last_name',
        'img',
        'dropped',
        'class_id'
    ];
    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('first_name', 'like', '%'.$filters['search'].'%')
            ->orWhere('last_name', 'like', '%'.$filters['search'].'%');
        }
        if($filters['section'] ?? false){
            $query->where('class_id', 'like', $filters['section']);
        }

    }




}
