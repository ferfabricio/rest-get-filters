<?php

namespace Tests\Unit\Filters;

use FerFabricio\RestGetFilters\Filters\Equal;
use FerFabricio\RestGetFilters\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Mockery;
use PHPUnit\Framework\TestCase;

class EqualTest extends TestCase
{
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    public function testIdentifier()
    {
        $this->assertEquals('equal', Equal::IDENTIFIER);
    }

    public function testOperators()
    {
        $filter = new Equal();
        $this->assertIsArray($filter->operators());
        $this->assertSame(
            [],
            $filter->operators()
        );
    }

    public function testApplyInClass()
    {
        $exampleModel = new class() {
            use Filterable;

            protected $filters = [
                'test' => Equal::IDENTIFIER,
            ];
        };

        $query = Mockery::spy(Builder::class);
        $query->shouldReceive('where')
            ->once()
            ->with('test', '=', 'to equal');

        $exampleModel->scopeFilters(
            $query,
            ['test' => 'to equal']
        );
    }

    /**
     * @dataProvider nullAndEmptyScenario
     *
     * @param mixed $value
     */
    public function testWithEmptyValue($value)
    {
        $exampleModel = new class() {
            use Filterable;

            protected $filters = [
                'test' => Equal::IDENTIFIER,
            ];
        };

        $query = Mockery::spy(Builder::class);
        $query->shouldNotReceive('where');

        $exampleModel->scopeFilters(
            $query,
            ['test' => $value]
        );
    }

    public function nullAndEmptyScenario(): array
    {
        return [
            [''],
            [null],
        ];
    }
}
