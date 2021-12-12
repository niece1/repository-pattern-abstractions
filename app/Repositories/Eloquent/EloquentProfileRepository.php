<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ProfileRepository;
use App\Repositories\RepositoryAbstract;
use App\Models\Profile;

/**
 * Description of EloquentProfileRepository
 *
 * @author test
 */
class EloquentProfileRepository extends RepositoryAbstract implements ProfileRepository
{
    public function entity()
    {
        return Profile::class;
    }
}
