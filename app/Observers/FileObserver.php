<?php

namespace App\Observers;

use App\DTOs\CopyLeaksAuthResponse;
use App\Models\Files;
use Exception;
use Http;
use Illuminate\Support\Facades\Storage;
use Log;
use PhpOffice\PhpWord\IOFactory;

class FileObserver
{
    /**
     * Handle the Files "created" event.
     *
     * @param Files $files
     * @return void
     */
    public function created(Files $files)
    {
        $file = $files;
        try {
            $reader = IOFactory::createReader();
            $content = $reader->load(Storage::path($file->path));

            $word = "";

            foreach ($content->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if (method_exists($element, 'getElements')) {
                        foreach ($element->getElements() as $childElement) {
                            if (method_exists($childElement, 'getText')) {
                                $word .= $childElement->getText() . ' ';
                            } else if (method_exists($childElement, 'getContent')) {
                                $word .= $childElement->getContent() . ' ';
                            }
                        }
                    } else if (method_exists($element, 'getText')) {
                        $word .= implode("", $element->getText()) . ' ';
                    }
                }
            }

            $authResponse = Http::post("https://id.copyleaks.com/v3/account/login/api", [
                "Key" => env('COPYLEAKS_KEY'),
                "Email" => env('COPYLEAKS_EMAIL')
            ]);

            if ($authResponse->status() == 200) {
                $copyLeaksAuthResponse = new CopyLeaksAuthResponse($authResponse->json());

                $nameOfFileWithExtension = explode("/", $file->path);
                Log::info("Name of file: " . end($nameOfFileWithExtension));
                $base64File = base64_encode($word);
                Log::info("BASE64 File: " . $base64File);

                $data = [
                    "base64" => $base64File,
                    "filename" => end($nameOfFileWithExtension),
                    "properties" => [
                        "webhooks" => [
                            "status" => "https://3516-196-41-88-253.ngrok.io/api/scanned"
                        ],
                        "includeHtml" => true,
                        "sandbox" => false,
                        "author" => [
                            "id" => "student_" . $file->user->id,
                        ],
                        "pdf" => [
                            "create" => true,
                            "title" => $file->title,
                        ]
                    ],
                ];

                $copyLeaksScanUploadResponse = Http::withHeaders([
                    "Content-Type" => "application/json",
                    "Authorization" => "Bearer " . $copyLeaksAuthResponse->getAccessToken(),
                ])->put("https://api.copyleaks.com/v3/scans/submit/file/scan_" . $file->id, $data);

                if ($copyLeaksScanUploadResponse->status() == 201) {
                    $file->uploaded = true;
                    $file->save();
                } else {
                    throw new Exception("Failed to upload scan");
                }
            } else {
                throw new Exception("Failed to authenticate to copyleaks");
            }
        } catch (Exception $exception) {
            $file->failed = true;
            $file->failure_reason = $exception->getMessage();
            $file->save();
            dd($exception);
        }
    }
}
