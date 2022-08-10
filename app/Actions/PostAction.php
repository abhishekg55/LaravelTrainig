<?php

namespace App\Actions;

use App\Models\Post;

class PostAction
{
    public function execute()
    {
        return Post::where('is_active', true)->get();
    }
}
