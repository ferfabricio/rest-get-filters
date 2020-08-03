<?php

namespace Tests\Unit\Filters;

use FerFabricio\RestGetFilters\Filters\Like;
use FerFabricio\RestGetFilters\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Mockery;
use PHPUnit\Framework\TestCase;

class LikeTest extends TestCase
{
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    public function testIdentifier()
    {
        $this->assertEquals('like', Like::IDENTIFIER);
    }

    public function testOperators()
    {
        $filter = new Like();
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
                'test' => Like::IDENTIFIER,
            ];
        };

        $query = Mockery::spy(Builder::class);
        $query->shouldReceive('where')
            ->once()
            ->with('test', 'like', '%to like%');

        $exampleModel->scopeFilters(
            $query,
            ['test' => 'to like']
        );
    }
}
