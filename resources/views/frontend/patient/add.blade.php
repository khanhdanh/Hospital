<x-frontend.frontend-master>

@section('content')
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 col-md-8">
                    <h3 class="mb-30">REGISTER PATIENTS</h3>
                    <form method="post" action="{{ route('patient.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="patient-name">Name</label>
                                <input type="text" class="form-control" id="patient-name" placeholder="Name" name="name">
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender_group">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label> <br>
                                <input type="date" id="dob" name="dob">
                            </div>
                            <div class="form-group">
                                <label for="age">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="phone-no">Phone</label>
                                <input type="number" class="form-control" id="phone-no" placeholder="Contact No" name="phone">
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
    </div>

@endsection

</x-frontend.frontend-master>
