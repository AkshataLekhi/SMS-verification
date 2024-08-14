@extends('backend.dashboard.layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('branches.create') }}" class="btn btn-success">Create Branch</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Branch Name</th>
                <th scope="col">Location</th>
                <th scope="col">Number</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($branches as $branch)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $branch->name }}</td>
                <td>{{ $branch->location }}</td>
                <td>{{ $branch->number }}</td>
                <td>{{ $branch->email }}</td>
                <td>
                    <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline;">
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
