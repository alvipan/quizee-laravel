<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
	public function get() {

	}

  public function create(Request $request) {
		Question::create([
			'material_id'   => $request['material_id'],
			'content'       => $request['content'],
			'option_a'      => $request['option_a'],
			'option_b'      => $request['option_b'],
			'option_c'      => $request['option_c'],
			'option_d'      => $request['option_d'],
			'answer'        => $request['answer'],
			'timer'         => $request['timer'],
			'reward'        => $request['reward'],
		]);
	}

	public function update(Request $request) {

	}
}
