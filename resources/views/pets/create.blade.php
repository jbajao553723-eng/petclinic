<h1>Add Pet</h1>

<form method="POST" action="{{ route('pets.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Pet Name">
    <input type="text" name="species" placeholder="Species (Dog, Cat)">
    <input type="text" name="breed" placeholder="Breed">
    <input type="number" name="age" placeholder="Age">
    <input type="text" name="gender" placeholder="Gender">

    <button type="submit">Save</button>
</form>