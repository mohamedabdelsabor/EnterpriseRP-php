<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }


    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();
        Employee::create($validated);
        return redirect(route('employees.index'));
    }


    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }


    public function update(EmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        $employee->update($validated);
        return redirect(route('employees.index'));
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect(route('employees.index'));
    }
}
