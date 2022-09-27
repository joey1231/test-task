<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_websites', 'website_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
