<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\RepositoryAbstract;
use App\Models\Category;

/**
 * Description of EloquentCategoryRepository
 *
 * @author test
 */
class EloquentCategoryRepository extends RepositoryAbstract implements CategoryRepository
{
    public function entity()
    {
        return Category::class;
    }
    
    public function allLive()
    {
        return $this->entity->where('live', true)->get();
    }
    
    public function findBySlug($slug)
    {
        return $this->findWhereFirst('slug', $slug);
    }
}
