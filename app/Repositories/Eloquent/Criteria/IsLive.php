<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

/**
 * Description of IsLive
 *
 * @author test
 */
class IsLive implements CriterionInterface
{
    public function apply($entity)
    {
        //called from trait HasLive
        return $entity->live();
    }
}
