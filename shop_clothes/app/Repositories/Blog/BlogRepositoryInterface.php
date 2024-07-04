<?php

namespace App\Repositories\Blog;

interface BlogRepositoryInterface
{
    public function getLatestBlogs($limit = 3);
}
