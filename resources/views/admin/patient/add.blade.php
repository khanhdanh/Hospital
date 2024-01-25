<x-admin.admin-master>

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Patient</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('patient.store') }}">

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="patient-name">Name</label>
                        <input type="text" class="form-control" id="patient-name" placeholder="Name" name="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender_group">
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="A-">Other</option>
                        </select>
                    @error('gender_group')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="age">Birthday</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    @error('age')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone-no">Phone</label>
                        <input type="number" class="form-control" id="phone-no" placeholder="Contact No" name="phone">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

</x-admin.admin-master>
