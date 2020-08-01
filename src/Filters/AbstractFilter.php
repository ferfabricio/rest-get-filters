<?php

namespace FerFabricio\RestGetFilters\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class AbstractFilter.
 */
abstract class AbstractFilter
{
    /**
     * @return array
     */
    public function operators(): array
    {
        return [];
    }

    /**
     * @param Builder $query
     * @param string $column
     * @param array $filter
     *
     * @return Builder
     */
    public function apply(Builder $query, string $column, array $filter): Builder
    {
        $operator = $this->identifyOperator($column, $filter);
        $key = $this->identifyKey($column, $filter);
        if (array_key_exists($key, $filter)) {
            $query->where($column, $operator, $filter[$key]);
        }

        return $query;
    }

    /**
     * @param string $identifier
     * @param string $column
     *
     * @return string
     */
    protected function getColumnWithOperatorIdentifier(string $identifier, string $column): string
    {
        return "{$column}_{$identifier}";
    }

    /**
     * @param string $column
     * @param array $filter
     *
     * @return string
     */
    protected function identifyOperator(string $column, array $filter): string
    {
        $keys = array_keys($filter);

        foreach ($this->operators() as $representation => $operator) {
            if (in_array($this->getColumnWithOperatorIdentifier($representation, $column), $keys)) {
                return $operator;
            }
        }

        return '=';
    }

    /**
     * @param string $column
     * @param array $filter
     *
     * @return string
     */
    protected function identifyKey(string $column, array $filter): string
    {
        $keys = array_keys($this->operators());
        $filterKeys = array_keys($filter);

        foreach ($keys as $key) {
            $identifier = $this->getColumnWithOperatorIdentifier($key, $column);
            if (in_array($identifier, $filterKeys)) {
                return $identifier;
            }
        }

        return $column;
    }
}
