<?php

namespace FerFabricio\RestGetFilters\Traits;

use FerFabricio\RestGetFilters\FilterFactory;

trait Filterable
{
    protected $filters = [];

    public function scopeFilters($query, array $conditions)
    {
        foreach ($this->filters as $column => $filter) {
            $filterInstance = FilterFactory::getFilter($filter);
            $filterInstance->apply($query, $column, $conditions);
        }
    }
}
