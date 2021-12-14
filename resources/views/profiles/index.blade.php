@foreach ($users as $user)
    @foreach ($user->profiles as $profile)
    <h1>{{ $profile->description }}</h1>
    @endforeach
@endforeach
