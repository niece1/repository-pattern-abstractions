<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\NoEntityDefined;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Criteria\CriteriaInterface;
use Illuminate\Support\Arr;

abstract class RepositoryAbstract implements RepositoryInterface, CriteriaInterface
{
    /**
     * Entity instance.
     *
     * @var type object
     */
    protected $entity;

    /**
     * Instantiate a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    /**
     * Get all items of the entity, get is Eloquent method.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->entity->get();
    }

    /**
     * Get distinct item of the entity.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function find($id)
    {
        $model = $this->entity->find($id);

        if (!$model) {
            throw (new ModelNotFoundException())->setModel(
                get_class($this->entity->getModel()),
                $id
            );
        }

        return $model;
    }

    /**
     * Get specified item of the entity.
     *
     * @param $column
     * @param $value
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhere($column, $value)
    {
        return $this->entity->where($column, $value)->get();
    }

    /**
     * Get first item of the entity.
     *
     * @param $column
     * @param $value
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhereFirst($column, $value)
    {
        $model = $this->entity->where($column, $value)->first();

        if (!$model) {
            throw (new ModelNotFoundException())->setModel(
                get_class($this->entity->getModel())
            );
        }

        return $model;
    }

    /**
     * Get paginated item list of the entity.
     *
     * @param $perPage
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate($perPage = 10)
    {
        return $this->entity->paginate($perPage);
    }

    /*
     * Create entity instance.
     *
     * @param array $properties
     * @return \Illuminate\Http\Response
     */
    public function create(array $properties)
    {
        return $this->entity->create($properties);
    }

    /*
     * Update entity instance.
     *
     * @param $id
     * @param array $properties
     * @return \Illuminate\Http\Response
     */
    public function update($id, array $properties)
    {
        return $this->find($id)->update($properties);
    }

    /**
     * Delete entity instance.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * Define which entity to be utilized.
     *
     * @return object
     */
    protected function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined();
        }

        return app()->make($this->entity());
    }

    /*
     * Add criteria to the query.
     *
     * @param $criteria
     * @return object
     */
    public function withCriteria(...$criteria)
    {
        $criteria = Arr::flatten($criteria); // we need flatten criteria to get this parameter as not a multidim. array

        foreach ($criteria as $criterion) {
            $this->entity = $criterion->apply($this->entity);
        }
        return $this;
    }
}
