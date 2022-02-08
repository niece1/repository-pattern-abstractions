<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\HasLive;

class Category extends Model
{
    use HasFactory;
    use HasLive;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
