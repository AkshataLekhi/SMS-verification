@extends("layouts.app")

@section("content")
<div class="container mt-5">
    @if(Session::has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h3>EDIT DEPARTMENT</h3>
                </div>

                <div class="card-body p-4">
                    <form method="post" action="{{ route('departments.update', $department->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name ="department_id" value="{{ $department->id }}">

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="departmentName" name="departmentName" placeholder="Department Name" required value="{{ $department->departmentName }}">
                            <label for="departmentName">Department Name</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="managerName" name="managerName" placeholder="Manager Name" required value="{{ $department->managerName }}">
                            <label for="managerName">Manager Name</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required value="{{ $department->email }}">
                            <label for="email">Email</label>
                        </div>

                        <div class="mb-3">
                            <label for="branch_id" class="form-label">Branch</label>
                            <select class="form-control" id="branch_id" name="branch_id" required>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $department->branch_id == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-outline-success">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
