<?php

namespace App\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

/**
 *
 * @author test
 */
trait HasLive
{
    //Multiple entities have live columns(the reason of this trait)
    public function scopeLive(Builder $builder)
    {
        return $builder->where('live', true);
    }
}
