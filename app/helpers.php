<?php

function get_present_themes() {
    $themes = [];

    $dir = new DirectoryIterator(public_path() . '/themes');
    foreach ($dir as $fileInfo)
        if ($fileInfo->isDir() && !$fileInfo->isDot())
            $themes[] = $fileInfo->getFilename();

    return $themes;
}


function load_administrator_settings() {
    $dir = new DirectoryIterator(storage_path() . '/administrator_settings');
    foreach ($dir as $fileInfo) {
        if ($fileInfo->isDot()) continue;
        if (!$fileInfo->isFile()) continue;

        $ext = $fileInfo->getExtension();
        if('json' == $ext) {
            $data = json_decode(file_get_contents( $fileInfo->getPathname()), true);
            Config::set('settings.' . $fileInfo->getBasename(".$ext"), $data );
        }
    }
}