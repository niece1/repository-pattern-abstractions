<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ProfileRepository;
use App\Repositories\Contracts\UserRepository;

/**
 * An example how to get data through user relations yet not Profile model directly but one need to use Eloquent only
 *
 * @author Volodymyr Zhonchuk
 */
class ProfileController extends Controller
{
    protected $users;

    protected $addresses;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $users = $this->users->all();

        return view('profiles.index', compact('users'));
    }

    /**
     * The way of creating without constructor
     *
     * @param UserRepository $users
     */
    /*public function store(UserRepository $users)
    {
        $users->createProfile(auth()->id(),[
            'description' => 'Instagram photos'
        ]);
    }*/

    public function store()
    {
        //Somehow like this
        $this->users->createProfile(auth()->id(), [
            'description' => 'Instagram photos'
        ]);
    }

    public function destroy()
    {
        //May be you need to check policies or whether auth user, parameter id is hardcoded
        $this->profiles->delete(1);
    }
}
