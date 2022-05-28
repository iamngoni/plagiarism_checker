<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function home() {
        $data = [
            'allFiles' => count(Files::all()),
            'processed' => count(Files::whereProcessed(true)->get()),
            'pending' => count(Files::whereUploaded( true)->whereProcessed( false)->get()),
            'files' => Files::whereUserId( Auth::user()->id)->paginate(10),
        ];
        return view('student.home', $data);
    }
}
