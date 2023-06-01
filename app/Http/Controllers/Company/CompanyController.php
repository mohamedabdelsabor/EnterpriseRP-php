<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Arr;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }


    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();
        $logo      = Arr::pull($validated, 'logo');
        $company   = Company::create($validated);
        $logo && $company
            ->addMedia($logo)
            ->toMediaCollection('logo');

        return redirect(route('companies.index'));
    }


    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }


    public function update(CompanyRequest $request, Company $company)
    {
        $validated = $request->validated();
        $logo      = Arr::pull($validated, 'logo');
        $company->update($validated);

        $logo &&  $company->clearMediaCollection('logo') && $company
            ->addMedia($logo)
            ->toMediaCollection('logo');

        return redirect(route('companies.index'));
    }


    public function destroy(Company $company)
    {
        $company->delete();
        return redirect(route('companies.index'));
    }
}
