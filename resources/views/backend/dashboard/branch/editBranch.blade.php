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
                    <h3>EDIT BRANCH</h3>
                </div>

                <div class="card-body p-4">
                    <form method="post" action="{{ route('branches.update', $branches->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name ="branch_id" value="{{ $branches->id }}">

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="branchName" name="branchName" placeholder="Branch Name" required value="{{ $branches->name }}">
                            <label for="branchName">Branch Name</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="location" name="location" placeholder="Location" required value="{{ $branches->location }}">
                            <label for="location">Location</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="number" name="number" placeholder="Contact Number" required value="{{ $branches->number }}">
                            <label for="number">Number</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required value="{{ $branches->email }}">
                            <label for="email">Email</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('branches.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-outline-success">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
