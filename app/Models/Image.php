<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['imageable_type','imageable_type','image_name'];
    
    public function imageable() {
        return $this->morphTo();
    }
}
