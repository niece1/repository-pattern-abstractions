<?php

namespace App\Repositories\Criteria;

/**
 *
 * @author test
 */
interface CriteriaInterface
{
    // one can pass just array instead of ...
    public function withCriteria(...$criteria);
}
