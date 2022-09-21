<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ArticleFilter extends ApiFilter
{
    protected array $safeParams = [
        'id' => ['eq'],
        'name' => ['eq'],
        'createdAt' => ['eq', 'gt', 'lt'],
        'updatedAt' => ['eq', 'gt', 'lt'],
        'slug' => ['eq'],
    ];
    protected array $columnMap = [
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at',
    ];
}
