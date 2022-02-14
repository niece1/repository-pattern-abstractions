<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ProfileRepository;
use App\Repositories\Contracts\UserRepository;

/**
 * An example how to get data through user relations,
 * yet not Profile model directly, but one need to use Eloquent only.
 *
 * @author Volodymyr Zhonchuk
 */
class ProfileController extends Controller
{
    /**
     * User instance.
     *
     * @var type object
     */
    protected $users;

    /**
     * Profile instance.
     *
     * @var type object
     */
    protected $profiles;

    /**
     * Instantiate a new controller instance.
     *
     * @param \App\Repositories\Contracts\UserRepository $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Display all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->all();

        return view('profiles.index', compact('users'));
    }

    /**
     * The way of creating without constructor.
     *
     * @param UserRepository $users
     */
     /*
     public function store(UserRepository $users)
    {
        $users->createProfile(auth()->id(),[
            'description' => 'Instagram photos'
        ]);
    }
    */

    /**
     * Store a newly created profile.
     */
    public function store()
    {
        //Somehow like this
        $this->users->createProfile(auth()->id(), [
            'description' => 'Instagram photos'
        ]);
    }

    /**
     * Delete a profile.
     */
    public function destroy()
    {
        //May be you need to check policies or whether auth user, parameter id is hardcoded
        $this->profiles->delete(1);
    }
}
