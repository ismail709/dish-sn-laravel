<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description"];

    // liked Dishes
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, "user_likes_dish");
    }
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, "user_favorites_dish");
    }
}
