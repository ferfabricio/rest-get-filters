<?php

namespace FerFabricio\RestGetFilters\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function operators(): array;

    public function apply(Builder $query, string $column, array $filter): Builder;
}
