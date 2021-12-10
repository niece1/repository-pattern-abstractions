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
        $categories = $this->categories->withCriteria([
            new LatestFirst(),
            new IsLive(),
            //new ByUser(auth()->id()), // commented because need auth package installed
        ])->all();
        
        return view('categories.index', compact('categories'));
    }
}
