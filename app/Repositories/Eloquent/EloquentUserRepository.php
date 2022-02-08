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

    public function createProfile($userId, array $properties)
    {
        return $this->find($userId)->addresses()->create($properties);
    }

    public function deleteProfile($userId, $profileId)
    {
        //DELETE FROM profiles WHERE user_id=1 and profile_id=2
        return $this->find($userId)->profiles()->findOrFail($profileId)->delete();
    }
}
