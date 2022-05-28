<?php

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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

Route::any('pdf-report', function (Request $request) {
    Log::info("PDF REPORT EVENT");

    Log::info($request->files);
    Log::info(json_encode($request->all()));

    return response()->json(['message' => 'stuff done!'], 200);
});
