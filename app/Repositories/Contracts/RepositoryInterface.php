<?php

namespace App\Repositories\Contracts;

/**
 *
 * @author test
 */
interface RepositoryInterface
{
    public function all();

    public function find($id);

    public function findWhere($column, $value);

    public function findWhereFirst($column, $value);

    public function paginate($perPage = 10);

    public function create(array $properties); // properties are from the form inputs

    public function update($id, array $properties);

    public function delete($id);
}
