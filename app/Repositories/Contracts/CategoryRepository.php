<?php

namespace App\Repositories\Contracts;

/**
 *
 * @author test
 */
interface CategoryRepository
{
    public function findBySlug($slug); //specific method for Category, we don't need include in criteria because it's need only once and here
}
