<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Get user record associated with specified post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get category record associated with specified post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
