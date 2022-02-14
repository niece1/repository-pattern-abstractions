<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    /**
     * Get all items of the entity.
     */
    public function all();

    /**
     * Get distinct item of the entity.
     *
     * @param $id
     */
    public function find($id);

    /**
     * Get item according to specific criteria.
     *
     * @param $column
     * @param $value
     */
    public function findWhere($column, $value);

    /**
     * Get first item according to specific criteria.
     *
     * @param $column
     * @param $value
     */
    public function findWhereFirst($column, $value);

    /**
     * Paginate response.
     *
     * @param $perPage
     */
    public function paginate($perPage = 10);

    /*
     * Create entity.
     *
     * @param $properties
     */
    public function create(array $properties); // properties are from the form inputs

    /*
     * Update entity.
     *
     * @param $id
     * @param $properties
     */
    public function update($id, array $properties);

    /*
     * Delete entity.
     *
     * @param $id
     */
    public function delete($id);
}
