<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Upload
{

    protected $uploadedFile;

    public function __construct(object $request)
    {
        $this->uploadedFile = $request->file('photos');
    }

    public function upload($folder)
    {

        $ext =  $this->uploadedFile->getClientOriginalExtension();
        $fileName = time().'_'. Str::slug($this->uploadedFile->getClientOriginalName()).".".$ext;
        $this->uploadedFile->storeAs($folder, $fileName, 'public');
        return $fileName;
    }
}