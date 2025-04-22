<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    /**
     * Show the form for creating a new company.
     */
    public function create(): Response
    {
        return Inertia::render('company/Create');
    }

    /**
     * Store a newly created company in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        $company = Company::create($validated);

        if ($request->hasFile('logo')) {
            $company->logo = $request->file('logo')->store('logos', 'public');
            $company->save();
        }

        // Associate the company with the current user
        $user = Auth::user();
        $user->company_id = $company->id;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Company created successfully.');
    }
} 