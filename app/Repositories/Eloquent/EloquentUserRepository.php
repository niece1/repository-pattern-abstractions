<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\RepositoryAbstract;

/**
 * Description of EloquentUserRepository
 *
 * @author test
 */
class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{
    // one may call it model
    public function entity()
    {
        return User::class;
    }
}
