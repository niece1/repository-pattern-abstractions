<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\RepositoryAbstract;
use App\Models\Category;

class EloquentCategoryRepository extends RepositoryAbstract implements CategoryRepository
{
    /**
     * Get category entity.
     *
     * @return string
     */
    public function entity()
    {
        //one can return a string 'Category' or make it like below
        return Category::class;
    }

    /**
     * Find item by slug.
     *
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findBySlug($slug)
    {
        return $this->findWhereFirst('slug', $slug);
    }
}
