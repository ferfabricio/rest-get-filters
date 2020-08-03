<?php

namespace FerFabricio\RestGetFilters\Filters;

use Illuminate\Database\Eloquent\Builder;

class Date extends AbstractFilter implements FilterInterface
{
    public const IDENTIFIER = 'date';

    /**
     * @return array
     */
    public function operators(): array
    {
        return [
            'gt' => '>',
            'gte' => '>=',
            'lt' => '<',
            'lte' => '<=',
        ];
    }

    public function apply(Builder $query, string $column, array $filter): Builder
    {
        $operator = $this->identifyOperator($column, $filter);
        $key = $this->identifyKey($column, $filter);
        if (array_key_exists($key, $filter)) {
            $query->whereDate($column, $operator, $filter[$key]);
        }

        return $query;
    }
}
