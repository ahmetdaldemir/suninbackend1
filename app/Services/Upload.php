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
        $this->uploadedFile = $request;
    }

    public function upload($folder)
    {
        $this->uploadedFile = $this->uploadedFile->file('photos');
        $ext =  $this->uploadedFile->getClientOriginalExtension();
        $fileName = time().'_'. Str::slug($this->uploadedFile->getClientOriginalName()).".".$ext;
        $this->uploadedFile->storeAs($folder, $fileName, 'public');
        return $fileName;
    }
    public function uploads($folder,$name)
    {
        $this->uploadedFile = $this->uploadedFile->file($name);
        $ext =  $this->uploadedFile->getClientOriginalExtension();
        $fileName = time().'_'. Str::slug($this->uploadedFile->getClientOriginalName()).".".$ext;
        $this->uploadedFile->storeAs($folder, $fileName, 'public');
        return $fileName;
    }
}