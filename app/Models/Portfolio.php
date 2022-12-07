<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'url',
        'github_url'
    ];

    public function image() {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
