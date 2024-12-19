
<x-app-layout>
<div class="container">
    @auth
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-success mb-3">Add New Company</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>
                            @if ($company->logo)
                                <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/logos/default.png') }}" alt="{{ $company->name }} Logo" class="img-thumbnail" style="height: 50px; width: auto;">
                            @else
                                <span>No Logo</span>
                            @endif
                        </td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        {{ $companies->links() }}
    @else
        <div class="alert alert-warning">
            You must be logged in to view this page.
        </div>
    @endauth
</div>

</x-app-layout>
