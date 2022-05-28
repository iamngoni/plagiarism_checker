<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Copyleaks\Copyleaks;
use Copyleaks\CopyleaksFileSubmissionModel;
use Copyleaks\SubmissionActions;
use Copyleaks\SubmissionAuthor;
use Copyleaks\SubmissionExclude;
use Copyleaks\SubmissionFilter;
use Copyleaks\SubmissionIndexing;
use Copyleaks\SubmissionPDF;
use Copyleaks\SubmissionProperties;
use Copyleaks\SubmissionRepository;
use Copyleaks\SubmissionScanning;
use Copyleaks\SubmissionScanningCopyleaksDB;
use Copyleaks\SubmissionScanningExclude;
use Copyleaks\SubmissionWebhooks;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CopyLeaksController extends Controller
{
    public function uploadFile(Request $request) {
//        dd($request->all());
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required'
            ]);

            $fileName = Storage::disk('local')->put('Uploads', $request->file('document'));

            $file = new Files;
            $file->user_id = Auth::user()->id;
            $file->title = $request->input('title');
            $file->path = $fileName;
            $file->save();

            DB::commit();

            return back()->with('success');
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }

    public function downloadFile($id) {
        $file = Files::find($id);
        return Storage::download($file->path);
    }
}
