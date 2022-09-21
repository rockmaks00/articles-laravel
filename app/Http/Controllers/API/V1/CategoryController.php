<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CategoryCollection;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request): CategoryCollection
    {
        $filter = new CategoryFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value'], ...]
        $categories = Category::where($filterItems);

        $includeArticles = $request->query('includeArticles');
        if($includeArticles) {
            $categories = $categories->with('articles');
        }

        return new CategoryCollection($categories->paginate()->appends($request->query()));
    }
}
