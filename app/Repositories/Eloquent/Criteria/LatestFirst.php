<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

/**
 * Description of LatestFirst
 *
 * @author test
 */
class LatestFirst implements CriterionInterface
{
    public function apply($entity)
    {
        //latest() is a default scope on Laravels builder
        return $entity->latest();
    }
}
