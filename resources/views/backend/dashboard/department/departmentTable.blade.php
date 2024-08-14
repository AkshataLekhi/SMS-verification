@extends('backend.dashboard.layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('departments.create') }}" class="btn btn-success">Create Department</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Department Name</th>
                <th scope="col">Manager Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($departments as $department)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $department->departmentName }}</td>
                <td>{{ $department->managerName }}</td>
                <td>{{ $department->email }}</td>
                <td>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
