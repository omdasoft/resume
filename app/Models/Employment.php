<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Employment extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'company',
        'country',
        'start_date',
        'end_date',
        'until_now'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function employmentDetails () {
        return $this->hasMany(EmploymentDetails::class);
    }
}
