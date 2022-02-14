<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ProfileRepository;
use App\Repositories\RepositoryAbstract;
use App\Models\Profile;

class EloquentProfileRepository extends RepositoryAbstract implements ProfileRepository
{
    /**
     * Get profile entity.
     *
     * @return string
     */
    public function entity()
    {
        return Profile::class;
    }
}
