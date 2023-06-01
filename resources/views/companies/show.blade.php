<x-app-layout>
    <div class="container mt-5" style="display:flex; justify-content:center; align-items:center">
        <div class="card" style="width: 26rem;">
            <img class="card-img-top" src="{{ $company->image }}" alt="Card image cap">
            <div class="card-body">
                <div class="card-text mt-3">

                    <h4 class="card-title"><span style="font-weight:bold">Company Name: </span>{{ $company->name }}</h4>
                    <p class="card-text"><span style="font-weight:bold">Company Email: </span>{{ $company->email }}</p>
                    <h5><span style="font-weight:bold">Company Website: </span>{{ $company->website }}</h5>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('companies.index') }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>
</x-app-layout>
