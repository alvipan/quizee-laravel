<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function editor($id = null) {
        $data = [
            'page' => 'materials',
            'title' => $id ? 'Edit material' : 'Create new material',
            'material' => $id ? Material::find($id) : json_decode('{}'),
        ];
        return view('materials.editor', $data);
    }

    public function save(Request $request) {
        if (isset($request->id)) {
            $material = Material::find($request->id);
            $material->title = $request->title;
            $material->content = $request->content;
            $material->category = $request->category;
            $material->price = $request->price;
            $material->save();
        } else {
            Material::create([
                'uid'       => Auth::id(),
                'title'     => $request->title,
                'content'   => $request->content,
                'category'  => $request->category,
                'price'     => $request->price,
            ]);
        }
        return [
            'success' => true
        ];
    }

    public function addQuestion(Request $request) {
        $question = Question::create([
            'uid'       => Auth::id(),
            'mid'       => $request['mid'],
            'content'   => $request['content'],
            'option_a'  => $request['option_a'],
            'option_b'  => $request['option_b'],
            'option_c'  => $request['option_c'],
            'option_d'  => $request['option_d'],
            'answer'    => $request['answer'],
            'timer'     => $request['timer'],
            'reward'    => $request['reward'],
        ]);
        return [
            'success' => true,
            'question' => $question,
        ];
    }

    public function questions($id) {
        return Question::where('mid', $id)->get();
    }
}
