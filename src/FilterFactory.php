<?php

namespace FerFabricio\RestGetFilters;

use FerFabricio\RestGetFilters\Filters\Comparison;
use FerFabricio\RestGetFilters\Filters\Date;
use FerFabricio\RestGetFilters\Filters\Equal;
use FerFabricio\RestGetFilters\Filters\FilterInterface;
use FerFabricio\RestGetFilters\Filters\Like;

/**
 * Class FilterFactory.
 */
class FilterFactory
{
    protected const FILTERS = [
        Comparison::IDENTIFIER => Comparison::class,
        Date::IDENTIFIER => Date::class,
        Equal::IDENTIFIER => Equal::class,
        Like::IDENTIFIER => Like::class,
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
