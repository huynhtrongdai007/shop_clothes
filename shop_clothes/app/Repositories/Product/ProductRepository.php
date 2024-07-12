<?php

namespace App\Repositories\Product;



use App\Models\Category;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;


class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }


    public function getRelatedProducts($product, $limit= 4)
    {
    return $this->model->where('category_id', $product->category_id)
        ->where('tag', $product->tag)
        ->limit($limit)
        ->get();
    }

    public function getRelatedProductsByCategory(int $categoryId)
    {
        return $this->model->where('featured', true)
            ->where('category_id', $categoryId)
            ->get();
    }
    public function getProductOnIndex($request)
    {


        $search = $request -> search ?? '';

        $products = $this->model->where('name','like', '%' .$search . '%');

        $products = $this -> sortAndPagination($products, $request);

        return $products;
    }

    public function getProductsByCategory($categoryName, $request)
    {

        $products = Category::where('name', $categoryName)->first()->products->toQuery();

        $products = $this -> sortAndPagination($products, $request);
        return $products;
//        $category = Category::where('name', $categoryName)->first();
//        if ($category) { echo "Category found: " . $category->name; }
//        else { echo "Category not found."; }
    }
    private function sortAndPagination($products, Request $request)
    {
        $perPage= $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'latest';
        switch ($sortBy) {
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            default:
                $products = $products->orderBy('id');
        }
        $products = $products -> paginate($perPage);
        $products ->appends(['sort_by' =>$sortBy, 'show' => $perPage]);
        return $products;
    }
}
