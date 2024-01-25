<x-admin.admin-master>

    @section('content')
        <div class="row">
            @if (session('staff-delete-message'))
                <div class="col-12 mt-2">
                    <div class="alert alert-danger">{{ session('staff-delete-message') }}</div>
                </div>
            @elseif(session('staff-update-message'))
                <div class="col-12 mt-2">
                    <div class="alert alert-success">{{ session('staff-update-message') }}</div>
                </div>
            @elseif(session('staff-create-message'))
                <div class="col-12 mt-2">
                    <div class="alert alert-success">{{ session('staff-create-message') }}</div>
                </div>
            @endif

            <div class="col-12 my-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-staff-lg">
                    Create Staff
                </button>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Staff List</h3>
                    </div>
                    <!-- ... -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Birthday</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Note</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (sizeof($staffs) != 0)
                                    @foreach ($staffs as $staff)
                                        <tr>
                                            <td>{{ $staff->id }}</td>
                                            <td><a data-toggle="modal" data-target="#modal-{{ $staff->id }}"
                                                    href="">{{ $staff->name }}</a></td>
                                            <td>{{ $staff->gender }}</td>
                                            <td>{{ $staff->dob }}</td>
                                            <td>{{ $staff->phone }}</td>
                                            <td>{{ $staff->email }}</td>



                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#modal-{{ $staff->id }}">
                                                    Edit
                                                </button>
                                                <!-- staff Edit Modal -->
                                                <div class="modal fade" id="modal-{{ $staff->id }}"
                                                    style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit staff</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card card-primary">
                                                                            <!-- /.card-header -->
                                                                            <!-- form start -->
                                                                            <form method="post"
                                                                                action="{{ route('staff.update', $staff->id) }}"
                                                                                enctype="multipart/form-data"
                                                                                class="needs-validation" novalidate>

                                                                                @csrf
                                                                                @method('PATCH')
                                                                                <div class="card-body">
                                                                                    <div class="form-group">
                                                                                        <label for="staff-name">Name</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="staff-name"
                                                                                            value="{{ $staff->name }}"
                                                                                            name="name" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="staff-name">Gender</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="staff-gender"
                                                                                            value="{{ $staff->gender }}"
                                                                                            name="gender" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="staff-name">Birthday</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="staff-dob"
                                                                                            value="{{ $staff->dob }}"
                                                                                            name="dob" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="phone-no">Phone</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            id="phone-no"
                                                                                            value="{{ $staff->phone }}"
                                                                                            name="phone" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Email</label>
                                                                                        <input type="email"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            value="{{ $staff->email }}"
                                                                                            name="email" required>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="speciality">Note</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="note" value=""
                                                                                            name="note">
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.card-body -->
                                                                                <div class="card-footer">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Submit</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('staff.delete', $staff->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" cursor="pointer"
                                                        class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">No Data to show</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        </div>
        <!-- /.card -->
        </div>
        </div>

        <!-- Staff Create Modal -->
        <div class="modal fade" id="modal-staff-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Staff</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="offset-md-1 col-md-10">
                                <div class="card card-primary">
                                    <form method="post" action="{{ route('staff.store') }}"
                                        enctype="multipart/form-data" class="needs-validation" novalidate>
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="staff-name">Name</label>
                                                    <input type="text" class="form-control" id="staff-name"
                                                        placeholder="Name" name="name" required>
                                                    <!-- ... -->
                                                </div>
                                                <!-- ... (other fields) ... -->
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="staff-name">Name</label>
                                                        <input type="text" class="form-control" id="staff-name"
                                                            placeholder="Name" name="name" required>
                                                        <div class="invalid-feedback">
                                                            Name field is required
                                                        </div>
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender_group">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="birthday">Birthday</label> <br>
                                                        <input type="date" id="dob" name="dob">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="phone-no">Phone</label>
                                                        <input type="number" class="form-control" id="phone-no"
                                                            placeholder="Contact No" name="phone" required>
                                                        <div class="invalid-feedback">
                                                            Contact is required
                                                        </div>
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control"
                                                            id="exampleInputEmail1" placeholder="Enter email"
                                                            name="email" required>
                                                        <div class="invalid-feedback">
                                                            Email field is required
                                                        </div>
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="form-group col-md-3">
                                                        <label for="password">{{ __('Password') }}</label>
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="new-password">
                                                        <div class="invalid-feedback">
                                                            Password is required
                                                        </div>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                        <input id="password-confirm" type="password" class="form-control"
                                                            name="password_confirmation" required
                                                            autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ... -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    @endsection

    @section('script')
        <script>
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    var forms = document.getElementsByClassName('needs-validation');
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    @endsection

</x-admin.admin-master>
