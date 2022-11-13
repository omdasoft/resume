<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'github_url',
        'linkedin_url',
        'title',
        'summary',
        'photo',
        'cv'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function image() {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
