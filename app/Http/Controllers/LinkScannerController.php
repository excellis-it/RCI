<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

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
}
