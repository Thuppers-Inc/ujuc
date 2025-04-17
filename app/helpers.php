<?php

if (!function_exists('vite_asset')) {
    /**
     * Générer l'URL pour un asset à partir du manifeste de build.
     *
     * @param  string  $path
     * @return string
     */
    function vite_asset($path)
    {
        $manifestPath = public_path('build/manifest.json');
        
        if (!file_exists($manifestPath)) {
            return asset('build/' . $path);
        }
        
        $manifest = json_decode(file_get_contents($manifestPath), true);
        $path = $manifest[$path] ?? $path;
        
        return asset('build/' . $path);
    }
} 