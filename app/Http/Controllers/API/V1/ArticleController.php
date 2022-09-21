<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArticleCollection;
use App\Filters\V1\ArticleFilter;
use App\Http\Resources\V1\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request): ArticleCollection
    {
        $filter = new ArticleFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value'], ...]
        $articles = Article::where($filterItems);

        $includeAuthor = $request->query('includeAuthor'); //default = true
        if($includeAuthor != 'false') {
            $articles = $articles->with('author');
        }

        $includeCategories = $request->query('includeCategories');
        if($includeCategories) {
            $articles = $articles->with('categories');
        }

        return new ArticleCollection($articles->paginate()->appends($request->query()));
    }
}
