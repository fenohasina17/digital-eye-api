<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Name</td>
			<td>{{$user->name}}</td>
		</tr>

		<tr>
			<td>School</td>
			<td>{{$user->school}}</td>
		</tr>
		<tr>
			<td>IP Address</td>
			<td>{{$user->ip_address}}</td>
		</tr>
		<tr>
			<td>Https port</td>
			<td>{{$user->https_port}}</td>
		</tr>

		<tr>
			<td>Created at</td>
			<td>{{$user->created_at}}</td>
		</tr>

		</tbody>
	</table>
</div>

