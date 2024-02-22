<?php

namespace App\Http\Controllers\Api;

use App\Models\Material;
use App\Models\Library;
use App\Models\Question;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function get($id = null)
    {
        $material = $id 
            ? Material::find($id) 
            : Material::whereDoesntHave('answered', function(Builder $query) {
                $query->where('user_id', Auth::id());
            })->get();

        $material->makeHidden([
            'uid',
            'content',
            'published',
            'created_at',
            'updated_at'
        ])->toArray();

        if (!$id) {
            for ($i = 0; count($material) > $i; $i++) {
                $material[$i]['questions'] = [
                    'count' => Question::where('material_id', $material[$i]['id'])->count(),
                    'reward' => Question::where('material_id', $material[$i]['id'])->sum('reward'),
                    'timer' => Question::where('material_id', $material[$i]['id'])->sum('timer'),
                ];
            }
        } else {
            $material->questions = [
                'count' => $material->questions()->count(),
                'reward' => $material->questions()->sum('reward'),
                'timer' => $material->questions()->sum('timer'),
            ];
            
            if (Library::firstWhere('material_id', $material->id)) {
                $material->makeVisible('content')->toArray();
            }
        }
        
        return [
            'success' => true,
            'data' => $material,
        ];
    }

    public function questions(int $material_id) {
        $questions = Question::where('material_id', $material_id)->get();
        $questions->makeHidden([
            'uid',
            'answer',
            'created_at',
            'updated_at'
        ])->toArray();
        
        return [
            'success' => true,
            'data' => $questions,
        ];
    }
}
