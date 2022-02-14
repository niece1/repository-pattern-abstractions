<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\HasLive;

class Category extends Model
{
    use HasFactory;
    use HasLive;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'user_id',
    ];

    /**
     * Fetch a route key (for testing purposes, unused).
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get posts associated with specified category.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
