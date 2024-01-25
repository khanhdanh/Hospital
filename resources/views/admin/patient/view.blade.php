<x-admin.admin-master>

@section('content')
<div class="row">
	@if(session('patient-delete-message'))
	<div class="col-12">
		<div class="alert alert-danger">{{ session('patient-delete-message') }}</div>
	</div>
	@elseif(session('patient-update-message'))
	<div class="col-12">
		<div class="alert alert-success">{{ session('patient-update-message') }}</div>
	</div>
	@elseif(session('patient-create-message'))
	<div class="col-12">
		<div class="alert alert-success">{{ session('patient-create-message') }}</div>
	</div>
	@endif

	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Patients</h3>
				<div class="card-tools">
					<div class="input-group input-group-sm" style="width: 150px;">
						<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
						<div class="input-group-append">
							<button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Gender</th>
							<th>DoB</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Note</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($patients as $patient)
							<tr>
								<td>{{ $patient->id }}</td>
								<td><a href="{{ route('patient.edit', $patient->id) }}">{{ $patient->name }}</a></td>
								<td>{{ $patient->gender }}</td>
								<td>{{ $patient->dob }}</td>
								<td>{{ $patient->email }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->note }}</td>
								<td>
									<form action="{{ route('patient.delete', $patient->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" cursor="pointer" class="btn btn-danger">Delete</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

</x-admin.admin-master>
