@extends('backend.dashboard.layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('designations.create') }}" class="btn btn-success">Create Designation</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Title</th>
                <th scope="col">Salary</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($designations as $designation)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $designation->title }}</td>
                <td>{{ $designation->salary }}</td>
                <td>
                    <a href="{{ route('designations.edit', $designation->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('designations.destroy', $designation->id) }}" method="POST" style="display:inline;">
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
