<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function home() {
        $data = [
            'allFiles' => count(Files::whereUserId(Auth::user()->id)->get()),
            'processed' => count(Files::whereProcessed(true)->whereUserId(Auth::user()->id)->get()),
            'pending' => count(Files::whereUploaded( true)->whereProcessed( false)->whereUserId(Auth::user()->id)->get()),
            'files' => Files::whereUserId( Auth::user()->id)->paginate(10),
        ];
        return view('student.home', $data);
    }

    public function searchForDocuments (Request $request) {
        $query = $request->input('query');
        $data = [
            'query' => $query,
            'files' => Files::where('title', 'like', '%' . $query . '%')->paginate(10),
        ];
        return view('student.search', $data);
    }
}
