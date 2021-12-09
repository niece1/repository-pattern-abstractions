<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\Contracts\{
    CategoryRepository,
    UserRepository
};
use App\Repositories\Eloquent\Criteria\{
    ByUser,
    IsLive,
    LatestFirst,
    EagerLoad
};

class CategoryController extends Controller
{
    protected $categories;
    
    protected $users;
    
    public function __construct(CategoryRepository $categories, UserRepository $users)
    {
        $this->categories = $categories;
        $this->users = $users;
    }
    
    public function index()
    {
        $categories = $this->categories->all();
        dd($categories);
        //return view('categories.index', compact('categories'));
    }
}