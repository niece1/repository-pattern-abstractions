<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class EagerLoad implements CriterionInterface
{
    /**
     * Eloquent relations.
     */
    protected $relations;

    /**
     * Instantiate a new class instance.
     *
     * @param $relations
     * @return void
     */
    public function __construct(array $relations)
    {
        $this->relations = $relations;
    }

    /*
     * Utilize entity.
     *
     * @param $entity
     */
    public function apply($entity)
    {
        return $entity->with($this->relations);
    }
}
