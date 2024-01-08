@extends('app')

@section('title', 'Users')

@section('content')

@php
$users = App\Models\User::orderby('name', 'desc')->limit(20)->get()
@endphp

<div class="row">
	<div class="col">
		<div class="table-responsive">
			<table class="table text-center">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Balance</th>
					<th>Registered at</th>
					<th>Action</th>
				</thead>
				<tbody>

					@forelse ($users as $user)
					@php
					$id = match (true) {
						$user->id < 10 => '00000'.$user->id,
						$user->id < 100 => '0000'.$user->id,
						$user->id < 1000 => '000'.$user->id,
						$user->id < 10000 => '00'.$user->id,
						$user->id < 100000 => '0'.$user->id,
						default => '000'.$user->id
					};
					@endphp
					<tr>
						<td>{{ $id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>Rp {{ $user->balance }}</td>
						<td>{{ $user->created_at }}</td>
						<td>
							<a href="/users/edit/{{ $user->id }}">Edit</a>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4">
							<h6 class="text-center mt-5">No user yet.</h6>
						</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection