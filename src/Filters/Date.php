<?php

namespace FerFabricio\RestGetFilters\Filters;

use AbstractFilter;

class Date extends AbstractFilter
{
    public const IDENTIFIER = 'date';

    public function operators(): array
    {
        return [
            'gt' => '>',
            'gte' => '>=',
            'lt' => '<',
            'lte' => '<='
        ];
    }
}
