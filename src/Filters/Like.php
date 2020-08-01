<?php

namespace FerFabricio\RestGetFilters\Filters;

use Illuminate\Database\Eloquent\Builder;

class Like implements FilterInterface
{
    public const IDENTIFIER = 'like';

    public function operators(): array
    {
        return [];
    }

    public function apply(Builder $query, string $column, array $filter): Builder
    {
        $value = $filter[$column] ?? '';
        return $query->where($column, 'like', "%{$value}%");
    }
}
