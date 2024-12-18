<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CompanyController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        $companies = Company::paginate(10); // Fetch companies with pagination
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create'); // Add a company
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ]);

        Company::create($validated);
        return redirect()->route('companies.index')->with('success', 'Company added successfully.');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company')); // Edit a company
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ]);

        $company->update($validated);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
