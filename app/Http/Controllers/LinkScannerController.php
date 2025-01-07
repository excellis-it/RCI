<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class LinkScannerController extends Controller
{
    /**
     * Scan and display all external links used in all views.
     *
     * @return \Illuminate\Http\Response
     */
    public function scanLinks()
    {
        // Array to store found external links
        $externalLinks = [];

        // Scan all Blade files in the views directory
        $viewFiles = $this->getAllViewFiles(resource_path('views'));

        // Iterate over each Blade file
        foreach ($viewFiles as $file) {
            // Get the file content
            $content = File::get($file);
            
            // Use regex to find all external URLs
            preg_match_all('/https?:\/\/[^\s]+/', $content, $matches);
            $externalLinks = array_merge($externalLinks, $matches[0]);
        }

        // Remove duplicates and return the unique external links
        $externalLinks = array_unique($externalLinks);

        return response()->json($externalLinks);
    }

    /**
     * Get all Blade view files recursively in the given directory.
     *
     * @param string $directory
     * @return array
     */
    private function getAllViewFiles($directory)
    {
        // Initialize an array to store view files
        $viewFiles = [];

        // Get all files in the directory recursively
        $files = File::allFiles($directory);

        // Filter for only Blade files
        foreach ($files as $file) {
            if (Str::endsWith($file->getRealPath(), '.blade.php')) {
                $viewFiles[] = $file->getRealPath();
            }
        }

        return $viewFiles;
    }


    /**
     * Process external links, download assets, and generate replacement links.
     *
     * @return \Illuminate\Http\Response
     */
    public function processAssets()
    {
        $externalLinks = [
            "http://www.w3.org/2000/svg",
            "https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js",
           // ....
        ];
        

        $replacements = [];
        $this->createDirectories();

        foreach ($externalLinks as $url) {
            $localPath = $this->downloadAsset($url);
            if ($localPath) {
                $replacements[] = [
                    'external' => $url,
                    'local' => "{{ asset('$localPath') }}"
                ];
            }
        }

        return response()->json([
            'message' => 'Assets downloaded successfully.',
            'replacements' => $replacements,
        ]);
    }

    /**
     * Create necessary directories inside storage.
     */
    private function createDirectories()
    {
        $directories = [
            storage_path('app/web_assets/css'),
            storage_path('app/web_assets/js'),
            storage_path('app/web_assets/images'),
        ];

        foreach ($directories as $directory) {
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }
        }
    }

    /**
     * Download the asset (CSS/JS/Image) and save it locally.
     *
     * @param string $url
     * @return string|null
     */
    private function downloadAsset($url)
    {
        $fileName = basename(parse_url($url, PHP_URL_PATH));
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);

        $folder = $this->getAssetFolder($extension);
        if (!$folder) {
            return null;
        }

        $localPath = "web_assets/$folder/$fileName";
        if (!Storage::exists($localPath)) {
            $response = Http::get($url);
            if ($response->successful()) {
                Storage::put($localPath, $response->body());
            } else {
                return null; // Skip if unable to download
            }
        }

        return $localPath;
    }

    /**
     * Get the folder name based on file extension.
     *
     * @param string $extension
     * @return string|null
     */
    private function getAssetFolder($extension)
    {
        $cssExtensions = ['css'];
        $jsExtensions = ['js'];
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg'];

        if (in_array($extension, $cssExtensions)) {
            return 'css';
        }

        if (in_array($extension, $jsExtensions)) {
            return 'js';
        }

        if (in_array($extension, $imageExtensions)) {
            return 'images';
        }

        return null;
    }


}
