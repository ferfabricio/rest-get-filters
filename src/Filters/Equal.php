<?php

namespace FerFabricio\RestGetFilters\Filters;

use AbstractFilter;

class Equal extends AbstractFilter
{
    public const IDENTIFIER = 'equal';

    public function operators(): array
    {
        return [];
    }
}
