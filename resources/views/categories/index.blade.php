@foreach ($categories as $category)
    <h1>{{ $category->title }} <small>{{ $category->created_at->diffForHumans() }}</small></h1>

    
@endforeach
