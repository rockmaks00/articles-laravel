<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Filters\V1\AuthorFilter;
use Illuminate\Http\Request;
use App\Http\Resources\V1\AuthorResource;
use App\Http\Resources\V1\AuthorCollection;

class AuthorController extends Controller
{
    public function index(Request $request): AuthorCollection
    {
        $filter = new AuthorFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value'], ...]
        $authors = Author::where($filterItems);

        $includeArticles = $request->query('includeArticles');
        if($includeArticles) {
            $authors = $authors->with('articles');
        }

        return new AuthorCollection($authors->paginate()->appends($request->query()));
    }
}
