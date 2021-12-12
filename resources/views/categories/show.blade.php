<h3>{{ $category->title }} <small>{{ $category->created_at->diffForHumans() }}</small></h3>

@foreach ($category->posts as $post)
    <p>{{ $post->body }} - {{ $post->user->name }}</p>
@endforeach
