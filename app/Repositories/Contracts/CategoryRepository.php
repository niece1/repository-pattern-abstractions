<?php

namespace App\Repositories\Contracts;

interface CategoryRepository
{
    /**
     * Find category by slug. A specific method for Category, we don't need include
     * in criteria because it's need only once and here.
     *
     * @param $slug
     */
    public function findBySlug($slug);
}
