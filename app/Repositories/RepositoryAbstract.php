<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\NoEntityDefined;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Criteria\CriteriaInterface;
use Illuminate\Support\Arr;

/**
 * Description of RepositoryAbstract
 *
 * @author test
 */
abstract class RepositoryAbstract implements RepositoryInterface, CriteriaInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }
    
    public function all()
    {
        return $this->entity->get(); //get is Eloquent method
    }
    
    public function find($id)
    {
        $model = $this->entity->find($id); //find is Eloquent method

        if (!$model) {
            throw (new ModelNotFoundException)->setModel(
                get_class($this->entity->getModel()), $id
            );
        }

        return $model;
    }
    //without get return Builder
    public function findWhere($column, $value)
    {
        return $this->entity->where($column, $value)->get(); //get is Eloquent method to return Laravel's Collection
    }
    
    public function findWhereFirst($column, $value)
    {
        $model = $this->entity->where($column, $value)->first();

        if (!$model) {
            throw (new ModelNotFoundException)->setModel(
                get_class($this->entity->getModel())
            );
        }

        return $model;
    }
    
    public function paginate($perPage = 10)
    {
        return $this->entity->paginate($perPage);
    }
    
    public function create(array $properties)
    {
        return $this->entity->create($properties);
    }
    
    public function update($id, array $properties)
    {
        return $this->find($id)->update($properties);
    }
    
    public function delete($id)
    {
        return $this->find($id)->delete();
    }
    
    protected function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined();
        }

        return app()->make($this->entity());
    }
    
    public function withCriteria(...$criteria)
    {
        $criteria = Arr::flatten($criteria); // we need flatten criteria to get this parameter as not a multidim. array

        foreach ($criteria as $criterion) {
            $this->entity = $criterion->apply($this->entity);
        }
        return $this;
    }
}
