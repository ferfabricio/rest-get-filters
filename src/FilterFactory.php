<?php

namespace FerFabricio\RestGetFilters;

use FerFabricio\RestGetFilters\Filters\Comparison;
use FerFabricio\RestGetFilters\Filters\Equal;

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
     * @return string
     */
    public static function getFilter($identifier): string
    {
        $filterClass = self::FILTERS[$identifier] ?? Equal::class;

        return new $filterClass();
    }
}
