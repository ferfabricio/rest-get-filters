<?php

namespace FerFabricio\RestGetFilters\Traits;

use FerFabricio\RestGetFilters\FilterFactory;

/**
 * Trait Filterable.
 */
trait Filterable
{
    /**
     * @param $query
     * @param array $conditions
     */
    public function scopeFilters($query, array $conditions)
    {
        foreach ($this->filters ?? [] as $column => $filter) {
            $filterInstance = FilterFactory::getFilter($filter);
            $filterInstance->apply($query, $column, $conditions);
        }
    }
}
