@extends('backend.dashboard.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-dark text-white text-center">
                    <h3 class="mb-0">Add New Branch</h3>
                </div>
                <div class="card-body p-4">
                    <form method="post" action="{{ route('branches.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="branchName" class="form-label">Branch Name</label>
                            <input type="text" class="form-control" id="branchName" name="branchName" placeholder="Enter branch name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="number" name="number" placeholder="Enter contact number" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('branches.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-dark">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
