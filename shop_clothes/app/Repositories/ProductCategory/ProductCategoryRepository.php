<?php

namespace App\Repositories\ProductCategory;




use App\Models\Category;
use App\Repositories\BaseRepository;



class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{

    public function getModel()
    {
        return Category::class;
    }

}
