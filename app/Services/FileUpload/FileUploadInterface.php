<?php

namespace App\Services\FileUpload;

use App\Models\Project;
use Illuminate\Http\UploadedFile;

interface FileUploadInterface
{
    public function upload(UploadedFile $file, Project $project): string;
}
