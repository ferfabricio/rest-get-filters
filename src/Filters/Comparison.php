<?php

namespace FerFabricio\RestGetFilters\Filters;

class Comparison extends AbstractFilter implements FilterInterface
{
    public const IDENTIFIER = 'comparision';

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
