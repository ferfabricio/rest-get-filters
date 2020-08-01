<?php

namespace FerFabricio\RestGetFilters\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    /**
     * @return array
     */
    public function operators(): array;

    /**
     * @param Builder $query
     * @param string $column
     * @param array $filter
     *
     * @return Builder
     */
    public function apply(Builder $query, string $column, array $filter): Builder;
}
