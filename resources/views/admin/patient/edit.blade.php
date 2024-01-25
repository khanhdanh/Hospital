<x-admin.admin-master>

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Patient</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('patient.update', $patient->id) }}">

                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="patient-name">Name</label>
                        <input type="text" class="form-control" id="patient-name" value="{{ $patient->name }}" name="name">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender_group">
                            <option value="female" @if($patient->gender == 'Female') selected @endif>Female</option>
                            <option value="male" @if($patient->gender == 'Male') selected @endif>Male</option>
                            <option value="other" @if($patient->gender == 'Other') selected @endif>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Birthday</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ $patient->dob }}">
                    </div>
                    <div class="form-group">
                        <label for="phone-no">Phone</label>
                        <input type="number" class="form-control" id="phone-no" value="{{ $patient->phone }}" name="phone">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

</x-admin.admin-master>
