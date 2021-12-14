<?php

namespace App\Repositories\Contracts;

/**
 *
 * @author test
 */
interface UserRepository
{
    public function createProfile($userId, array $properties);
    public function deleteProfile($userId, $profileId);
}
