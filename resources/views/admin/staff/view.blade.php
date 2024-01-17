<x-admin.admin-master>

    @section('content')
    <div class="row">
        @if(session('staff-delete-message'))
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
                                <form method="post" action="{{ route('staff.store') }}" enctype="multipart/form-data"  class="needs-validation" novalidate>
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="staff-name">Name</label>
                                                <input type="text" class="form-control" id="staff-name" placeholder="Name" name="name" required>
                                                <!-- ... -->
                                            </div>
                                            <!-- ... (other fields) ... -->
                                            <div class="form-group col-md-6">
                                                <label for="photo">Photo</label>
                                                <input type="file" class="form-control-file" id="photo" name="photo">
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
    