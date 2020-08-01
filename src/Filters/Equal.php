<?php

namespace FerFabricio\RestGetFilters\Filters;

use AbstractFilter;

class Equal extends AbstractFilter
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
