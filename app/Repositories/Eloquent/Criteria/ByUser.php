<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class ByUser implements CriterionInterface
{
    /**
     * Auth user id.
     */
    protected $userId;

    /**
     * Instantiate a new class instance.
     *
     * @param $userId
     * @return void
     */
    public function __construct($userId) // we use constructor to pass parameters like auth()->id()
    {
        $this->userId = $userId;
    }

    /*
     * Utilize entity.
     *
     * @param $entity
     */
    public function apply($entity)
    {
        return $entity->where('user_id', $this->userId);
    }
}
