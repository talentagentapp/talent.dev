@extends('layouts.master')
@section('content')

<div class="container">
	<div class='row'>
		<div class='col-md-12'>
			<table class='table table-bordered table-hover'>
				<thead>
					<tr>
						<td>Remove</td>
						<td>Username</td>
						<td>Last Name</td>
						<td>First Name</td>
						<td>eMail Address</td>
					</tr>
				</thead>
				<tbody>
					@forelse($users as $user)
					<tr>
						<td><input type="checkbox" name={{{$user->id}}}></td>
						<td><a href="{{{action('UsersController@show', $user->id)}}}">{{{$user->username}}}</a></td>
						<td>{{{$user->last}}}</td>
						<td>{{{$user->first}}}</td>
						<td>{{{$user->email}}}</td>
					</tr>
					@empty
					<p>No mo' users.</p>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop