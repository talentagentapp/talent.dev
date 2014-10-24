@extends('layouts.master')
@section('content')

{{--Ch--}}

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
					{{-- {{{ Form::open(array('route'=>'UsersController@destroy')) }}} --}}
					@forelse($users as $user)
					<tr>
						<button>Delete User(s)</button>
						<td><input type="checkbox" name={{{$user->id}}}></td>
						<td><a href="{{{action('UsersController@show', $user->id)}}}">{{{$user->username}}}</a></td>
						<td>{{{$user->last}}}</td>
						<td>{{{$user->first}}}</td>
						<td>{{{$user->email}}}</td>
					</tr>
					@empty
					<p>No mo' users.</p>
					@endforelse
					{{{ Form::close() }}}
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop