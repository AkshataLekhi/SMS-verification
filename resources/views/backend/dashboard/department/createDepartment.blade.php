@extends('backend.dashboard.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-dark text-white text-center">
                    <h3 class="mb-0">Add New Department</h3>
                </div>
                <div class="card-body p-4">
                    <form method="post" action="{{ route('departments.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="departmentName" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="departmentName" name="departmentName" placeholder="Enter Department Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="managerName" class="form-label">Manager Name</label>
                            <input type="text" class="form-control" id="managerName" name="managerName" placeholder="Enter Department Name" required>
                        </div>


                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                        </div>

                        <div class="mb-3">
                            <label for="branch_id" class="form-label">Branch</label>
                            <select class="form-control" id="branch_id" name="branch_id" required>
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-dark">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
