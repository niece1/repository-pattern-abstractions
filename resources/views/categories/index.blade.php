@foreach ($categories as $category)
    <h1>{{ $category->title }} <small>{{ $category->created_at->diffForHumans() }}</small></h1>
    
    @foreach ($category->posts as $post)
        <p>{{ $post->body }} - {{ $post->user->name }}</p>
    @endforeach   
@endforeach
