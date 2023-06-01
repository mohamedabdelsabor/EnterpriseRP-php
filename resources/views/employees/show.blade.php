<x-app-layout>
    <div class="container mt-5" style="display:flex; justify-content:center; align-items:center">
        <div class="card">
            <div class="card-body">
                <div class="card-text mt-3">

                    <h4 class="card-title"><span style="font-weight:bold">Employee First Name: </span>{{ $employee->first_name }}</h4>
                    <h4 class="card-title"><span style="font-weight:bold">Employee Last Name: </span>{{ $employee->last_name }}</h4>
                    <h4 class="card-title"><span style="font-weight:bold">Employee Email: </span>{{ $employee->email }}</h4>
                    <h4 class="card-title"><span style="font-weight:bold">Employee Phone: </span>{{ $employee->phone }}</h4>
                    <p class="card-text"><span style="font-weight:bold">Company Name: </span>{{ $employee->company->name ?? "No Company Yet" }}
                    </p>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{ route('employees.index') }}">Go Back</a>

                @if ($employee->company)
                    <a class="btn btn-primary" href="{{ route('companies.show', ['company' => $employee->company?->id]) }}">Company</a>
                @endif
            </div>
        </div>
</x-app-layout>
