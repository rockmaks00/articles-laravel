<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class ApiFilter
{
    // белый список параметров с их операторами
    protected array $safeParams;
    // словарь параметров: Json => DB
    protected array $columnMap;
    // словарь операторов: Http => Sql
    protected array $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
    //метод преобразования http-запроса в поисковой
    public function transform(Request $request): array
    {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);

            if (isset($query)) {
                //проверяем совместимость json с полями БД
                $column = $this->columnMap[$param] ?? $param;

                foreach ($operators as $operator) {
                    if (isset($query[$operator])) {
                        $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                    }
                }
            }
        }

        return $eloQuery;
    }
}
