<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public static function getAllPosts()
    {
        return Self::where('is_active', true)->get();
    }
}
