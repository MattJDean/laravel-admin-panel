<x-app-layout>
<div class="container">
    <h1>Edit Company</h1>
    <form action="{{ route('companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $company->email }}">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" name="website" class="form-control" value="{{ $company->website }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
</x-app-layout>
