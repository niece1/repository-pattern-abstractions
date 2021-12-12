<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ProfileRepository;
use App\Repositories\Contracts\UserRepository;

class ProfileController extends Controller
{
    protected $users;

    protected $addresses;

    public function __construct(UserRepository $users, ProfileRepository $profiles)
    {
        $this->users = $users;
        $this->profiles = $profiles;
    }

    public function index()
    {   
        //
    }
}
