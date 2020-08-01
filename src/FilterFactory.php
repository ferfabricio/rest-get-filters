<?php

namespace FerFabricio\RestGetFilters;

use FerFabricio\RestGetFilters\Filters\Comparison;
use FerFabricio\RestGetFilters\Filters\Equal;
use FerFabricio\RestGetFilters\Filters\FilterInterface;

class FilterFactory
{
    protected const FILTERS = [
        Comparison::IDENTIFIER => Comparision::class
    ];

    public static function getFilter($identifier): FilterInterface
    {
        return self::FILTERS[$identifier] ?? Equal::class;
    }
}
