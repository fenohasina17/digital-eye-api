<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Name</td>
			<td>{{$user->name}}</td>
		</tr>
		<tr>
			<td>First Name</td>
			<td>{{$user->first_name}}</td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td>{{$user->last_name}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$user->email}}</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>{{$user->phone}}</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>
				@if($user->active)
					<label class="label label-success label-inline mr-2">Active</label>
				@else
					<label class="label label-danger label-inline mr-2">Inactive</label>
				@endif
			</td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				@if($user->gender == 1)
					<label class="label label-success label-inline mr-2">Male</label>
				@else
					<label class="label label-danger label-inline mr-2">Female</label>
				@endif
			</td>
		</tr>
		<tr>
			<td>Parent</td>
			<td>
				@if($user->is_parent == 1)
					<label class="label label-success label-inline mr-2">Yes</label>
				@else
					<label class="label label-danger label-inline mr-2">No</label>
				@endif
			</td>
		</tr>
		<tr>
			<td>Employee</td>
			<td>
				@if($user->is_employee == 1)
					<label class="label label-success label-inline mr-2">Yes</label>
				@else
					<label class="label label-danger label-inline mr-2">No</label>
				@endif
			</td>
		</tr>
		<tr>
			<td>Created at</td>
			<td>{{$user->created_at}}</td>
		</tr>
        @if($user->image)
		<tr>
			<td>Image</td>
			<td><img src="{{asset("uploads/$user->image")}}" width="200" alt=""></td>
		</tr>
        @endif

		</tbody>
	</table>
</div>

