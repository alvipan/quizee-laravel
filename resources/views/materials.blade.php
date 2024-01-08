@extends('app')

@section('title', 'Materials')

@section('nav_menu')
<li class="nav-item">
	<a class="btn btn-primary" href="/materials/create">Create</a>
</li>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h6 class="mb-0"><i class="bx bx-book"></i> Material list</h6>
	</div>
	<table class="table text-center">
		<thead>
			<th>Title</th>
			<th>Category</th>
			<th>Questions</th>
			<th>Price</th>
			<th>Rewards</th>
			<th>Author</th>
			<th>Action</th>
		</thead>
		<tbody>
			@forelse (App\Models\Material::all() as $material)
			<tr>
				<td>{{$material->title}}</td>
				<td class="text-capitalize">{{$material->category}}</td>
				<td>{{count(App\Models\Question::where('mid', $material->id)->get())}}</td>
				<td>Rp {{$material->price}}</td>
				<td>{{App\Models\Question::where('mid', $material->id)->sum('reward')}} points</td>
				<td>{{App\Models\User::find($material->uid)->name}}</td>
				<td><a href="/materials/{{$material->id}}/edit">Edit</a></td>
			</tr>
			@empty
			<tr>
				<td colspan="5">No material yet.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
@endsection