<?php

namespace FerFabricio\RestGetFilters\Filters;

class Equal extends AbstractFilter implements FilterInterface
{
    public const IDENTIFIER = 'equal';

    /**
     * @return array
     */
    public function operators(): array
    {
        return [];
    }
}
