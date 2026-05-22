<?php

namespace App\Http\Controllers\Concerns;

trait HandlesFileUpload
{
    protected function storeUpload($file, string $folder): string
    {
        $dir = public_path('uploads/' . $folder);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
        $file->move($dir, $filename);
        return 'uploads/' . $folder . '/' . $filename;
    }

    protected function deleteUpload(?string $path): void
    {
        if ($path && str_starts_with($path, 'uploads/')) {
            $full = public_path($path);
            if (file_exists($full)) {
                unlink($full);
            }
        }
    }
}
