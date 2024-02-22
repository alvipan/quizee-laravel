@extends('app')

@section('title', 'Login')

@section('content')
<div class="row vh-100 justify-content-center align-items-center">
	<div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4">
		<h2 class="text-primary text-center fw-bold mb-5">Quizee</h2>
		<div class="card">
			<div class="card-header">
				<h5>Login</h5>
			</div>
			<div class="card-body">
				<form action="/login" method="post">
					@csrf

					<label for="email" class="form-label">Email:</label>
					<input name="email" id="email" type="email" class="form-control mb-3"/>

					<label for="password" class="form-label">Password</label>
					<input name="password" id="password" type="password" class="form-control mb-3"/>

					<button type="submit" class="btn btn-primary w-100">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
