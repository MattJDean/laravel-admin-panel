<x-app-layout>
<div class="container">
    <h1>Create New Company</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" name="website" class="form-control" value="{{ old('website') }}">
        </div>
        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
</x-app-layout>
