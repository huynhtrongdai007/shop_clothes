<?php

namespace App\Service\Blog;

use App\Repositories\BaseRepository;

interface BlogServiceInterface
{
    public function getLatestBlogs($limit = 3);
}
