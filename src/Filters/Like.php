<?php

namespace FerFabricio\RestGetFilters\Filters;

use Illuminate\Database\Eloquent\Builder;

class Like extends AbstractFilter implements FilterInterface
{
    public const IDENTIFIER = 'like';

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

        if (!$this->checkEmptyOrNull($value)) {
            $query->where($column, 'like', "%{$value}%");
        }

        return $query;
    }
}
