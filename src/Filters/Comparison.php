<?php

namespace FerFabricio\RestGetFilters\Filters;

use AbstractFilter;

class Comparison extends AbstractFilter implements FilterInterface
{
    public const IDENTIFIER = 'comparision';


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
