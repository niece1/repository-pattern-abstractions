<?php

namespace App\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

trait HasLive
{
    /*
     * Multiple entities have live columns (the reason of this trait).
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLive(Builder $builder)
    {
        return $builder->where('live', true);
    }
}
