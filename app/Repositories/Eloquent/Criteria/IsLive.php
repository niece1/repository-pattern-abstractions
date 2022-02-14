<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class IsLive implements CriterionInterface
{
    /*
     * Utilize entity.
     *
     * @param $entity
     */
    public function apply($entity)
    {
        //called from HasLive trait
        return $entity->live();
    }
}
