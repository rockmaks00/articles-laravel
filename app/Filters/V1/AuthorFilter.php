<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class AuthorFilter extends ApiFilter
{
    protected array $safeParams = [
        'id' => ['eq'],
        'firstName' => ['eq'],
        'lastName' => ['eq'],
        'patronymic' => ['eq'],
        'birthDate' => ['eq', 'gt', 'lt'],
        'slug' => ['eq'],
    ];
    protected array $columnMap = [
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'birthDate' => 'birth_date',
    ];
}
