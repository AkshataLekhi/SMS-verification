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
                    <h3>EDIT DESIGNATION</h3>
                </div>

                <div class="card-body p-4">
                    <form method="post" action="{{ route('designations.update', $designations->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name ="designation_id" value="{{ $designations->id }}">

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required value="{{ $designations->title }}">
                            <label for="title">Title</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="salary" name="salary" placeholder="Salary" required value="{{ $designations->salary }}">
                            <label for="salary">Salary</label>
                        </div>

                        <div class="mb-3">
                            <label for="branch_id" class="form-label">Branch</label>
                            <select class="form-control" id="branch_id" name="branch_id" required>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $designations->branch_id == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select class="form-control" id="department_id" name="department_id" required>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ $designations->department_id == $department->id ? 'selected' : '' }}>
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
