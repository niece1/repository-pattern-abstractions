<?php

namespace App\Repositories\Contracts;

interface UserRepository
{
    /*
     * Create user's profile.
     *
     * @param $userId
     * @param $properties
     */
    public function createProfile($userId, array $properties);

    /*
     * Delete user's profile.
     *
     * @param $userId
     * @param $profileId
     */
    public function deleteProfile($userId, $profileId);
}
