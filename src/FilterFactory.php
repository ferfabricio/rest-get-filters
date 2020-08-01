<?php

namespace FerFabricio\RestGetFilters;

use FerFabricio\RestGetFilters\Filters\Comparison;
use FerFabricio\RestGetFilters\Filters\Equal;
use FerFabricio\RestGetFilters\Filters\FilterInterface;

/**
 * Class FilterFactory.
 */
class FilterFactory
{
    protected const FILTERS = [
        Comparison::IDENTIFIER => Comparison::class,
    ];

    /**
     * @param $identifier
     *
     * @return FilterInterface
     */
    public static function getFilter($identifier): FilterInterface
    {
        $filterClass = self::FILTERS[$identifier] ?? Equal::class;

        return new $filterClass();
    }
}
