<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CategoryFilter extends ApiFilter
{
    protected array $safeParams = [
        'id' => ['eq'],
        'name' => ['eq'],
        'parentId' => ['eq', 'gt', 'lt'],
        'slug' => ['eq'],
    ];
    protected array $columnMap = [
        'parentId' => 'parent_id',
    ];
}
