<?php

declare(strict_types=1);

namespace App\Repository\Project;

use App\Models\Project;

interface ProjectRepositoryInterface
{
    public function saveImage(Project $project, string $linkToImage): void;

}
