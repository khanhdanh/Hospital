<x-admin.admin-master>

    @section('content')
        <div class="row">
            @if (session('service-delete-message'))
                <div class="col-12 mt-2">
                    <div class="alert alert-danger">{{ session('service-delete-message') }}</div>
                </div>
            @elseif(session('service-update-message'))
                <div class="col-12 mt-2">
                    <div class="alert alert-success">{{ session('service-update-message') }}</div>
                </div>
            @elseif(session('service-create-message'))
                <div class="col-12 mt-2">
                    <div class="alert alert-success">{{ session('service-create-message') }}</div>
                </div>
            @endif

            <div class="col-12 my-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Create Service
                </button>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Services</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Service Cost</th>
                                    <th>Status</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (sizeof($services) != 0)
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->id }}</td>
                                            <td>{{ $service->name }}</a></td>
                                            <td>{{ Str::words($service->description, 10) }}</td>
                                            <td>{{ $service->service_cost }}</td>
                                            <td>{{ $service->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#modal-{{ $service->id }}">
                                                    Edit
                                                </button>
                                                <div class="modal fade" id="modal-{{ $service->id }}"
                                                    style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Services</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card card-primary">
                                                                            <form method="post"
                                                                                action="{{ route('service.update', $service->id) }}"
                                                                                class="needs-validation" novalidate>

                                                                                @csrf
                                                                                @method('PATCH')
                                                                                <div class="card-body">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="service-name">Name</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="service-name"
                                                                                            value="{{ $service->name }}"
                                                                                            name="name" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="desc">Description</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="desc"
                                                                                            value="{{ $service->description }}"
                                                                                            name="description" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="cost">Service
                                                                                            Cost</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            id="cost"
                                                                                            value="{{ $service->service_cost }}"
                                                                                            name="service_cost" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Status</label>
                                                                                        <select class="form-control"
                                                                                            name="status" required>
                                                                                            <option value="1"
                                                                                                @if ($service->status == 1) selected @endif>
                                                                                                Active</option>
                                                                                            <option value="0"
                                                                                                @if ($service->status == 0) selected @endif>
                                                                                                Inactive</option>
                                                                                        </select>
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
                                                <form action="{{ route('service.destroy', $service->id) }}" method="post">
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

        <!-- Service Create Modal -->
        <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Services</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <form method="post" action="{{ route('service.store') }}"
                                        enctype="multipart/form-data" class="needs-validation" novalidate required>

                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="service-name">Name</label>
                                                <input type="text" class="form-control" id="service-name"
                                                    placeholder="Service Name" name="name" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="desc">Description</label>
                                                <input type="text" class="form-control" id="description"
                                                    placeholder="Service Description ....." name="description" required>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cost">Service Cost</label>
                                                <input type="number" class="form-control" id="cost"
                                                    name="service_cost" required>
                                                @error('service_cost')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status" required>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
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
