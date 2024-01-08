@extends('app')

@section('title', 'Questions')

@section('content')
<div class="form-label">
	Total questions: {{count(App\Models\Question::all())}} |
	Total points: {{App\Models\Question::sum('reward')}}
</div>
<div class="row">
	@forelse(App\Models\Question::all() as $question)
	<div class="col-xl-6 wh-100">
		<div class="card mb-3">
			<div class="card-body">
				<p>{{$question->content}}</p>
				<div class="row">
					<div class="col-6">
						<div @class([
							'alert',
							'alert-secondary',
							'alert-success' => ($question->option_a == $question[$question->answer])]) >
							A. {{$question->option_a}}
						</div>
					</div>

					<div class="col-6">
						<div @class([
							'alert',
							'alert-secondary',
							'alert-success' => ($question->option_b == $question[$question->answer])]) >
							B. {{$question->option_b}}
						</div>
					</div>

					<div class="col-6">
						<div @class([
							'alert',
							'alert-secondary',
							'alert-success' => ($question->option_c == $question[$question->answer])]) >
							C. {{$question->option_c}}
						</div>
					</div>

					<div class="col-6">
						<div @class([
							'alert',
							'alert-secondary',
							'alert-success' => ($question->option_d == $question[$question->answer])]) >
							D. {{$question->option_d}}
						</div>
					</div>

				</div>
				<hr class="mt-0"/>
				<div class="d-flex">
					<button class="btn btn-sm btn-outline-warning rounded-pill me-2 disabled">
						<i class="bx bx-time me-1"></i>
						{{$question->timer}} sec
					</button>

					<button class="btn btn-sm btn-outline-success rounded-pill disabled">
						<i class="bx bx-dollar-circle me-1"></i>
						{{$question->reward}} point
					</button>

					<button class="btn btn-sm btn-outline-primary rounded-pill ms-auto">Edit</button>
				</div>
			</div>
		</div>
	</div>
	@empty

	@endforelse
</div>
@endsection