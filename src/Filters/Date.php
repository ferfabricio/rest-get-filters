<?php

namespace FerFabricio\RestGetFilters\Filters;

class Date extends AbstractFilter implements FilterInterface
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
