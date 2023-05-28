<?php

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::any('scanned', function (Request $request) {
    Log::info("SCANNED EVENT");

    Log::info(json_encode($request->all()));

    $status = $request->get('status');

    if ($status == 0 || $status == "0") {
        $scannedDocument = $request->get('scannedDocument');
        $scanIdData = explode("_", $scannedDocument['scanId']);
        $scanId = $scanIdData[1];

        $file = Files::find($scanId);

        $file->processed = true;
        $file->failure_reason = json_encode($request->all());
        $file->save();
    }

    return response()->json(['message' => 'stuff done!'], 200);
});

Route::any('exported', function (Request $request) {
    Log::info("EXPORTED EVENT");

    Log::info(json_encode($request->all()));

    return response()->json(['message' => 'stuff done!'], 200);
});

Route::any('pdf-report/{id}', function (Request $request, $id) {
    Log::info("PDF REPORT EVENT");
    foreach ($request->all() as $key) {
        Log::info('Key: ' . $key);
    }
    $files = $request->allFiles();
    Log::info('Checking for files existence');
    // Process the files
    foreach ($files as $file) {
        Log::info('Found file.');
        // Check if the file is a PDF
        if ($file->getClientOriginalExtension() === 'pdf' || $file->getMimeType() === 'application/pdf') {
            Log::info('File matches pdf format');
            // The file is a PDF, save it to the desired location
            $filename = $file->getClientOriginalName();
            Log::info('File Name: ' . $filename);
            $file->move(storage_path('app/exports'), $filename);
            Log::info('File moved to exports');
            // Perform any additional processing here
        }
    }

    return response()->json();
});

Route::any('results-report/{id}/{resultsId}', function (Request $request, $id) {
    // Log::info("Results REPORT EVENT");

    // Log::info(json_encode($request->all()));

    return response()->json(['message' => 'stuff done!'], 200);
});

Route::any('crawled-report/{id}', function (Request $request, $id) {
    // Log::info("CRAWLED REPORT EVENT");

    // Log::info(json_encode($request->all()));

    $html = $request->get("html");

    $file = Files::find($id);

    $file->export_html_result = $html["value"];
    $file->save();

    return response()->json(['message' => 'stuff done!'], 200);
});
