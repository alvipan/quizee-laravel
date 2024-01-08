<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function get($id = null) {
        $user = $id ? User::find($id) : Auth::user();
        return [
            'success' => true,
            'data' => $user
        ];
    }

    public function overview($id) {
        $user = User::find($id);
        return [
            'success' => true,
            'data' => [
                [
                    'title' => 'Pustaka',
                    'description' => 'Jumlah materi yang sudah dibaca.',
                    'count' => $user->library()->count()
                ], [
                    'title' => 'Menjawab soal',
                    'description' => 'Jumlah soal yang terjawab, termasuk benar atau salah.',
                    'count' => $user->answering()->count()
                ], [
                    'title' => 'Pahala terkumpul',
                    'description' => 'Jumlah pahala yang diperoleh dari menjawab soal.',
                    'count' => $user->rewarded()
                ]
            ]
        ];
    }
}
