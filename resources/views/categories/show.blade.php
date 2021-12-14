<h2>{{ $category->title }}</h2>
<small>{{ $category->created_at->diffForHumans() }}</small>

@foreach ($category->posts as $post)
    <p>{{ $post->body }} - {{ $post->user->name }}</p>
@endforeach
