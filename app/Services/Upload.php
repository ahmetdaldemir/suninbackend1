<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Upload
{
    public function __construct(Request $request)
    {
        $uploadedFile = $request->file('photos');
        foreach ($uploadedFile as $item)
        {
            $filename = time() ."_". Str::of($item->getClientOriginalName())->slug('-');
            Storage::disk('local')->putFileAs(
                'files/' . $filename,
                $item,
                $filename
            );
            return $filename;
        }

    }
}