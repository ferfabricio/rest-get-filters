<?php

namespace FerFabricio\RestGetFilters\Filters;

use AbstractFilter;

class Date extends AbstractFilter
{
    public const IDENTIFIER = 'date';

    /**
     * @return array
     */
    public function operators(): array
    {
        return [
            'gt' => '>',
            'gte' => '>=',
            'lt' => '<',
            'lte' => '<=',
        ];
    }
}
