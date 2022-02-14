<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class LatestFirst implements CriterionInterface
{
    /*
     * Utilize entity, latest() is a default scope on Laravels builder.
     *
     * @param $entity
     */
    public function apply($entity)
    {
        return $entity->latest();
    }
}
