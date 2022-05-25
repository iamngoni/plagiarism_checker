<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function home() {
        $data = [
            'allFiles' => count(Files::all()),
            'processed' => count(Files::where('processed', true)->get()),
            'pending' => count(Files::where('uploaded', true)->where('processed', true)->get()),
            'files' => Files::where('user_id', Auth::user()->id)->paginate(10),
        ];
        return view('student.home', $data);
    }
}
