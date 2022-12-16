<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'percentage'
    ];

    //protected $appends = ['date'];

//    public function getDateAttribute() {
//        return $this->created_at->diffForHumans();
//    }

    public function getTitleAttribute($value) {
        return $this->title = ucfirst($value);
    }
}
