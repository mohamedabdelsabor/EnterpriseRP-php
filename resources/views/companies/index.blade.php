<x-app-layout>
    <div class="container mt-5" style="border: 2px solid black; border-radius:2%;">

        <table class="table table-striped">

            <a href="{{ route('companies.create') }}" class="btn btn-success mt-3 mb-3">Create</a>

            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">website</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('companies.show', ['company' => $company->id]) }}"
                                class="btn btn-info">Show</a>
                            <a href="{{ route('companies.edit', ['company' => $company->id]) }}"
                                class="btn btn-primary">Edit</a>
                            <form onclick="return confirm('are you sure?')"
                                action="{{ route('companies.destroy', ['company' => $company->id]) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</a>

                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="mt-3 mb-4 mx-5">
            {{ $companies->links() }}

        </div>

    </div>

</x-app-layout>
