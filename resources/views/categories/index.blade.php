@foreach ($categories as $category)
<a href="{{ route('categories.show', [$category->slug]) }}">
    <h1>{{ $category->title }}</h1>
</a>
<small>{{ $category->created_at->diffForHumans() }}</small>
    
@foreach ($category->posts as $post)
    <p>{{ $post->body }} - {{ $post->user->name }}</p>
@endforeach 

@endforeach
