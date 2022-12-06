<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc'
    ];

    public function employment() {
        return $this->belongsTo(Employment::class);
    }
}
