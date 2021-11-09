<?php

namespace App\Services;

use Illuminate\Support\Str;

class Upload
{
    public function __construct(Request $request)
    {
        $uploadedFile = $request->file('file');
        $filename = time() ."_". Str::of($uploadedFile->getClientOriginalName())->slug('-');
        Storage::disk('local')->putFileAs(
            'files/' . $filename,
            $uploadedFile,
            $filename
        );
        return $filename;
    }
}