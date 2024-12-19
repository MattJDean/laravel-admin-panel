<x-app-layout>
    <div class="container mt-5">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <p class="lead">Select a database to manage:</p>

        <div class="list-group">
            <a href="{{ route('companies.index') }}" class="list-group-item list-group-item-action">
                Companies
            </a>
            <a href="{{ route('employees.index') }}" class="list-group-item list-group-item-action">
                Employees
            </a>
        </div>
    </div>
</x-app-layout>

