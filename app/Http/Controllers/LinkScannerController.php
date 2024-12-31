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
            "https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.14/index.global.min.js",
            "https://cdn.jsdelivr.net/npm/fullcalendar/core@5.3.0/main.min.css",
            "https://cdn.jsdelivr.net/npm/fullcalendar/core@5.3.0/main.min.js",
            "https://cdn.jsdelivr.net/npm/fullcalendar/daygrid@5.3.0/main.min.css",
            "https://cdn.jsdelivr.net/npm/fullcalendar/daygrid@5.3.0/main.min.js",
            "https://cdn.jsdelivr.net/npm/fullcalendar/interaction@5.3.0/main.min.js",
            "https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css",
            "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css",
            "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
            "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css",
            "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css",
            "https://code.jquery.com/jquery-3.6.0.min.js",
            "https://envoyer.io",
            "https://excellis.co.in/rci//frontend_assets/images/drdo-logo.png",
            "https://excellis.co.in/rci//public/storage/logo/mJzAtluGFNXqKGhAfsw0riQ8ijlyvS29v56TAP2y.png",
            "https://excellis.co.in/rci//public/storage/logo/vdwXoIX2O0liZAlBvYhJBzcLPgg4qYLlrLnmk3Yu.png",
            "https://fonts.bunny.net",
            "https://fonts.bunny.net/css?family=figtree:400,600&display=swap",
            "https://forge.laravel.com",
            "https://laracasts.com",
            "https://laravel-news.com",
            "https://laravel.com/docs",
            "https://laravel.com/docs/billing",
            "https://laravel.com/docs/broadcasting",
            "https://laravel.com/docs/dusk",
            "https://laravel.com/docs/horizon",
            "https://laravel.com/docs/sanctum",
            "https://laravel.com/docs/telescope",
            "https://nova.laravel.com",
            "https://tailwindcss.com",
            "https://vapor.laravel.com"
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
