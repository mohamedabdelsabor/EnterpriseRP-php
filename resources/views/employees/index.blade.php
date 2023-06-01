<x-app-layout>
    <div class="container mt-5" style="border: 2px solid black;border-radius:2%;">

        <table class="table table-striped">

            <a href="{{ route('employees.create') }}" class="btn btn-success mt-3 mb-3">Create</a>

            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Company</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->company?->name }}</td>
                        <td>
                            <a href="{{ route('employees.show', ['employee' => $employee->id]) }}"
                                class="btn btn-info">Show</a>
                            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                                class="btn btn-primary">Edit</a>
                            <form onclick="return confirm('are you sure?')" action="{{ route('employees.destroy', ['employee' => $employee->id]) }}"
                                method="POST" class="d-inline">
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
            {{ $employees->links() }}

        </div>

    </div>


</x-app-layout>