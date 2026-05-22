<h1>My Pets</h1>

<a href="{{ route('pets.create') }}">Add Pet</a>

@foreach($pets as $pet)
    <div>
        <h3>{{ $pet->name }}</h3>
        <p>{{ $pet->species }} - {{ $pet->breed }}</p>
    </div>
@endforeach