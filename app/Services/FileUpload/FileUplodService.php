<?php

namespace App\Services\FileUpload;

use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class FileUplodService implements FileUploadInterface
{
    public function upload(UploadedFile $file, Project $project): string
    {
        if($project->image) {
            if(Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
        }

        $fileName = "id-" . $project->id . "." . $file->getClientOriginalExtension();
        $link = $file->storeAs('projects', $fileName, 'public');
        if(!$link) {
            throw new \Exception('Не удалось загрузить файл');
        }
        return $link;
    }
}
