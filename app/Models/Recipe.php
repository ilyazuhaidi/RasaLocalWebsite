<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'description',
        'image_path',
    ];

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_recipes')->withTimestamps();
    }
}
