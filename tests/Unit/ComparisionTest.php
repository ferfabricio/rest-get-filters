<?php

namespace Tests\Unit\Filters;

use FerFabricio\RestGetFilters\Filters\Comparison;
use PHPUnit\Framework\TestCase;

class ComparisionTest extends TestCase
{
    public function testIdentifier()
    {
        $this->assertEquals('comparision', Comparison::IDENTIFIER);
    }

    public function testOperators()
    {
        $filter = new Comparison();
        $this->assertIsArray($filter->operators());
        $this->assertSame(
            [
                'gt' => '>',
                'gte' => '>=',
                'lt' => '<',
                'lte' => '<=',
            ],
            $filter->operators()
        );
    }
}
