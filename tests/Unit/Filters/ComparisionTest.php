<?php

namespace Tests\Unit\Filters;

use FerFabricio\RestGetFilters\Filters\Comparison;
use FerFabricio\RestGetFilters\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Mockery;
use PHPUnit\Framework\TestCase;

class ComparisionTest extends TestCase
{
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

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

    public function filterScenarios() : array
    {
        return [
            [['test', '=', '123'], ['test' => '123']],
            [['test', '>', '123'], ['test_gt' => '123']],
            [['test', '>=', '123'], ['test_gte' => '123']],
            [['test', '<', '123'], ['test_lt' => '123']],
            [['test', '<=', '123'], ['test_lte' => '123']],
        ];
    }

    /**
     * @param array $parameters
     * @param array $requestFilters
     * @dataProvider filterScenarios
     */
    public function testApplyInClass(array $parameters, array $requestFilters)
    {
        $exampleModel = new class() {
            use Filterable;

            protected $filters = [
                'test' => Comparison::IDENTIFIER,
            ];
        };

        $query = Mockery::spy(Builder::class);
        $query->shouldReceive('where')
            ->once()
            ->with(...$parameters);

        $exampleModel->scopeFilters($query, $requestFilters);
    }
}
