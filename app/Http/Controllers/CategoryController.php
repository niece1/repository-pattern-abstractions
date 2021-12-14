<?php

namespace App\Http\Controllers;

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

    
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }
    
    public function index()
    {
        $categories = $this->categories->withCriteria([
            new LatestFirst(),
            new IsLive(),
            //new ByUser(auth()->id()), // commented because need auth package installed, example shows using parameters with criteria
            new EagerLoad(['posts', 'posts.user'])
        ])->all();

        //$categories->load(['posts', 'posts.user']); // a simpler way to eager load w/o EagerLoad criteria
        
        return view('categories.index', compact('categories'));
    }
    
    public function show($slug)
    {
        $category = $this->categories->withCriteria(new IsLive(), new EagerLoad(['posts.user']))->findBySlug($slug);

        return view('categories.show', compact('category'));
    }
}
