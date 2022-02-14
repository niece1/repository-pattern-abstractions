<?php

namespace App\Repositories\Criteria;

interface CriteriaInterface
{
    /*
     * Add criteria to the query. One can pass just array instead of spread operator.
     *
     * @param $criteria
     */
    public function withCriteria(...$criteria);
}
