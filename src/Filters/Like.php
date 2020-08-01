<?php

namespace FerFabricio\RestGetFilters\Filters;

use Illuminate\Database\Eloquent\Builder;

class Like implements FilterInterface
{
    public const IDENTIFIER = 'like';

    /**
     * @return array
     */
    public function operators(): array
    {
        return [];
    }

    /**
     * @param Builder $query
     * @param string $column
     * @param array $filter
     *
     * @return Builder
     */
    public function apply(Builder $query, string $column, array $filter): Builder
    {
        $value = $filter[$column] ?? '';

        return $query->where($column, 'like', "%{$value}%");
    }
}
