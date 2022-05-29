<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    public function home () {
        $data = [
            'allFiles' => Files::all()->count(),
            'processed' => Files::whereProcessed(true)->count(),
            'pending' => Files::whereUploaded( true)->whereProcessed( false)->count(),
            'files' => Files::paginate(10),
        ];
        return view('lecturer.home', $data);
    }
}
