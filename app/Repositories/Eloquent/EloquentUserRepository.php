<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\RepositoryAbstract;

class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{
    /**
     * Get user entity, one may call it model.
     *
     * @return string
     */
    public function entity()
    {
        return User::class;
    }

    /*
     * Create a profile.
     *
     * @param $userId
     * @param array $properties
     * @return \Illuminate\Http\Response
     */
    public function createProfile($userId, array $properties)
    {
        return $this->find($userId)->addresses()->create($properties);
    }

    /*
     * Delete a profile.
     *
     * @param $userId
     * @param $profileId
     * @return \Illuminate\Http\Response
     */
    public function deleteProfile($userId, $profileId)
    {
        //DELETE FROM profiles WHERE user_id=1 and profile_id=2
        return $this->find($userId)->profiles()->findOrFail($profileId)->delete();
    }
}
