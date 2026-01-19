<?php

class FileUtils {
    public static function getFolderName(string $this_path): string {
        $folder_name = dirname($this_path);
        $folder_name = basename($folder_name);
        return $folder_name;
    }
} 