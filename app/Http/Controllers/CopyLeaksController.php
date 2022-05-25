<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CopyLeaksController extends Controller
{
    private string $copyLeaksAuth = "https://api.copyleaks.com/documentation/v3/account/login";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadFile(Request $request) {
        dd($request);
        $request->validate([
           'title' => 'required'
        ]);

        $file = new Files;
        $file->user_id = Auth::user()->id;
        $file->title = $request->input('title');
        // TODO: Fix path here
        $file->path = "";
        $file->save();

        // Save file locally

        // Login to copyleaks

        // Submit file

        // Wait for webhook response
    }
}
