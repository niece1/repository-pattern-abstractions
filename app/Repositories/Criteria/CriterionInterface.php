<?php

namespace App\Repositories\Criteria;

interface CriterionInterface
{
    /*
     * Utilize entity.
     *
     * @param $entity
     */
    public function apply($entity);
}
